<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller implements HasMiddleware
{
    /**
     * Define middleware for this controller class.
     *
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view role', only: ['index']),
            new Middleware('permission:create role', only: ['create', 'store']),
            new Middleware('permission:edit role', only: ['edit', 'update']),
            new Middleware('permission:delete role', only: ['destroy']),
        ];
    }

    /**
     * Display a list of all roles.
     */
    public function index()
    {
        $roles = Role::latest()->get(['id', 'name']);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        $permissions = Permission::orderBy('id', 'asc')->pluck('name');
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created role with associated permissions.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => Str::lower($request->name),
            'guard_name' => 'web',
        ]);

        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
    }

    /**
     * Display the specified role with its permissions.
     */
    public function show(Role $role)
    {
        $role->load('permissions'); // eager load permissions
        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing a role.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('id', 'asc')->pluck('name');
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified role and sync permissions.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => Str::lower($request->name),
            'guard_name' => 'web',
        ]);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified role from the database.
     */
    public function destroy(Role $role)
    {
        if ($role->name === "administration") {
            return redirect()->route('admin.roles.index')->with('error', 'Administration role is protected');
        }

        try {
            $role->delete();
            return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
}
