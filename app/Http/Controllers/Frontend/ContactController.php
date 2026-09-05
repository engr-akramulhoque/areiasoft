<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormConfirmation;
use App\Models\Contact;
use Illuminate\Http\Request;
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
        /*
        |--------------------------------------------------------------------------
        | 1. Honeypot Protection
        |--------------------------------------------------------------------------
        */

        if ($request->filled('website')) {
            abort(422);
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Validate Request
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:3000'],
            'website' => ['nullable', 'string', 'max:255'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | 3. Rate Limiting
        |--------------------------------------------------------------------------
        | Allow 1 successful submission per IP every 24 hours.
        */

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

        /*
        |--------------------------------------------------------------------------
        | 4. Basic Spam Detection
        |--------------------------------------------------------------------------
        */

        $spamWords = [
            'share.google',
            'ozon',
            'розыгрыш',
            'денежные призы',
            'приз',
            'подарочную коробку',
            '1.000.000 рублей',
        ];

        $content = mb_strtolower(
            $validated['subject'] . ' ' . $validated['message']
        );

        foreach ($spamWords as $spamWord) {
            if (str_contains($content, mb_strtolower($spamWord))) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'email' => 'Your message could not be submitted. Please try again later.',
                    ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 5. Save Contact
        |--------------------------------------------------------------------------
        */

        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | 6. Start Rate Limit Only After Successful Submission
        |--------------------------------------------------------------------------
        */

        RateLimiter::hit($key, 86400);

        /*
        |--------------------------------------------------------------------------
        | 7. Send Confirmation Email
        |--------------------------------------------------------------------------
        */

        Mail::to($contact->email)
            ->send(new ContactFormConfirmation($contact));

        /*
        |--------------------------------------------------------------------------
        | 8. Success
        |--------------------------------------------------------------------------
        */

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