<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
            RolePermissionSeeder::class,
            UserSeeder::class,
        ];

        // Extra seeders for non-production environments
        if (! app()->environment('production')) {
            $seeders = array_merge($seeders, [
                // Add any additional seeders for non-production environments here
                BlogSeeder::class,
            ]);
        }

        $this->call($seeders);
    }
}
