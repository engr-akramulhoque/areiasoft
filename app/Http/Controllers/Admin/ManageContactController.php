<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ManageContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');

        $contacts = match ($filter) {
            'unread' => Contact::unread(),
            'read' => Contact::read(),
            'archived' => Contact::archived(),
            'starred' => Contact::starred(),
            default => Contact::query(),
        };

        $contacts = $contacts->latest()->paginate(10);

        return view('admin.contacts.index', compact('contacts', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        // Mark as read automatically
        if ($contact->status == Contact::STATUS_UNREAD) {
            $contact->update(['status' => Contact::STATUS_READ]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message deleted.');
    }

    // Archive message
    public function archive(Contact $contact)
    {
        $contact->update(['status' => Contact::STATUS_ARCHIVED]);

        return back()->with('success', 'Message archived.');
    }

    // Toggle Starred
    public function toggleStar(Contact $contact)
    {
        $contact->update(['is_starred' => ! $contact->is_starred]);

        return back()->with('success', 'Starred status updated.');
    }
}
