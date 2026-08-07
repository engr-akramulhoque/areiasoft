<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormConfirmation;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $contact = Contact::create($validated);
        
        // Send confirmation email to the user
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
