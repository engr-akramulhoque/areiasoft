<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Super User',
            'email' => 'superadmin@gmail.com',
            'status' => true,
            'is_admin' => true,
        ]);

        $user->assignRole('administration');
    }
}
