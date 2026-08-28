<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'users' => [
                'view user',
                'create user',
                'edit user',
                'delete user',
            ],

            'roles' => [
                'view role',
                'create role',
                'edit role',
                'delete role',
            ],

            'contacts' => [
                'view contact',
                'create contact',
                'edit contact',
                'delete contact',
            ],

            'blog_categories' => [
                'view_blog_category',
                'create_blog_category',
                'edit_blog_category',
                'delete_blog_category',
            ],

            'blogs' => [
                'view_blog',
                'create_blog',
                'edit_blog',
                'delete_blog',
            ],

            'others' => [
                'view seo-manager',
            ],
        ];

        // Create all permissions
        foreach ($permissions as $perms) {
            foreach ($perms as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }
        }

        // role with all permissions
        $admin = Role::firstOrCreate(['name' => 'administration']);
        $admin->syncPermissions(Permission::all());
    }
}
