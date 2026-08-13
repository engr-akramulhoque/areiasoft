<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\{
    Contact,
    User,
};

class DashboardController extends Controller
{
    public function __invoke()
    {
        $contacts = Contact::unread()->latest()->take(8)->get();

        // Cached dashboard stats (5 min)
        $stats = Cache::remember('dashboard.stats', now()->addMinutes(5), function () {
            return [
                'contacts'        => Contact::count(),
                'admin_users'     => User::admin()->count(),
            ];
        });

        // Recent Activities
        $recentActivities = collect();

        // Recent contact messages
        $recentActivities = $recentActivities->merge(
            Contact::latest()->take(3)->get()->map(function ($contact) {
                return [
                    'icon'  => 'fa-ticket-alt',
                    'color' => 'areia',
                    'title' => 'New contact message',
                    'text'  => "{$contact->name} sent a message: " . str($contact->subject)->limit(40),
                    'time'  => $contact->created_at,
                ];
            })
        );

        // Sort by latest time
        $recentActivities = $recentActivities
            ->sortByDesc('time')
            ->take(6)
            ->map(function ($activity) {
                $activity['time_human'] = $activity['time']->diffForHumans();
                return $activity;
            })
            ->values();

        return view('dashboard', compact('contacts', 'stats', 'recentActivities'));
    }
}
