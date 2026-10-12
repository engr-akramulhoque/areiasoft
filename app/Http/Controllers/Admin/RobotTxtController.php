<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RobotTxtController extends Controller implements HasMiddleware
{
    /**
     * Define middleware for this controller class.
     *
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_robots_txt', only: ['index']),
            new Middleware('permission:edit_robots_txt', only: ['update']),
        ];
    }

    public function index()
    {
        // Load robots.txt, or set default content if file doesn't exist
        $robotsPath = public_path('robots.txt');
        $content = file_exists($robotsPath) ? file_get_contents($robotsPath) : "User-agent: *\nDisallow:";

        return view('admin.robots.index', compact('content'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $robotsPath = public_path('robots.txt');

        try {
            // Optional: Backup old robots.txt
            if (file_exists($robotsPath)) {
                copy($robotsPath, public_path('robots-backup.txt'));
            }

            // Save new content
            file_put_contents($robotsPath, $request->input('content'));

            return redirect()->route('admin.robots.index')
                ->with('success', 'robots.txt updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update robots.txt: ' . $e->getMessage());
        }
    }
}
