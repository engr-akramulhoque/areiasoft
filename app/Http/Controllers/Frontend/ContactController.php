<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormConfirmation;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function store(Request $request)
    {
        $key = 'contact-form:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 1)) {
            $seconds = RateLimiter::availableIn($key);

            $hours = floor($seconds / 3600);
            $minutes = floor(($seconds % 3600) / 60);

            $message = 'You have already submitted a message today. Please try again tomorrow.';

            if ($hours > 0) {
                $message .= " You can submit again in {$hours} hour(s).";
            } elseif ($minutes > 0) {
                $message .= " You can submit again in {$minutes} minute(s).";
            }

            return back()
                ->withInput()
                ->withErrors([
                    'email' => $message,
                ]);
        }

        // Allow 1 attempt per IP every 24 hours
        RateLimiter::hit($key, 86400);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $contact = Contact::create($validated);

        Mail::to($contact->email)
            ->send(new ContactFormConfirmation($contact));

        return redirect()
            ->route('contact.success')
            ->with('success', 'Message sent successfully!');
    }

    public function success()
    {
        if (! session()->has('success')) {
            return redirect()->route('contact.index');
        }

        return view('frontend.pages.contact-success');
    }
}
