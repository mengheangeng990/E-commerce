<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AudienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users and audiences
        $user1 = User::create([
            'name' => 'veasna',
            'email' => 'veasna@example.com',
            'password' => Hash::make('password'),
        ]);
        Audience::create(['user_id' => $user1->id]);

        $user2 = User::create([
            'name' => 'samnang',
            'email' => 'samnang@example.com',
            'password' => Hash::make('password'),
        ]);
        Audience::create(['user_id' => $user2->id]);

        $user3 = User::create([
            'name' => 'ratana',
            'email' => 'ratana@example.com',
            'password' => Hash::make('password'),
        ]);
        Audience::create(['user_id' => $user3->id]);
    }
}
