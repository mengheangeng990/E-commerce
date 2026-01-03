<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole && !$adminUser->roles()->where('role_id', $adminRole->id)->exists()) {
            $adminUser->roles()->attach($adminRole);
        }

        // Create manager user
        $managerUser = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'Manager User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $managerRole = Role::where('name', 'manager')->first();
        if ($managerRole && !$managerUser->roles()->where('role_id', $managerRole->id)->exists()) {
            $managerUser->roles()->attach($managerRole);
        }

        // Create first staff user
        $staffUser1 = User::firstOrCreate(
            ['email' => 'staff1@example.com'],
            [
                'name' => 'Staff User 1',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $staffRole = Role::where('name', 'staff')->first();
        if ($staffRole && !$staffUser1->roles()->where('role_id', $staffRole->id)->exists()) {
            $staffUser1->roles()->attach($staffRole);
        }

        // Create second staff user
        $staffUser2 = User::firstOrCreate(
            ['email' => 'staff2@example.com'],
            [
                'name' => 'Staff User 2',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        if ($staffRole && !$staffUser2->roles()->where('role_id', $staffRole->id)->exists()) {
            $staffUser2->roles()->attach($staffRole);
        }
    }
}
