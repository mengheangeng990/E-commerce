<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users and authors
        $user1 = User::create([
            'name' => 'sok123',
            'email' => 'sok@example.com',
            'password' => Hash::make('password'),
        ]);
        Author::create(['user_id' => $user1->id]);

        $user2 = User::create([
            'name' => 'sao',
            'email' => 'sao@example.com',
            'password' => Hash::make('password'),
        ]);
        Author::create(['user_id' => $user2->id]);

        $user3 = User::create([
            'name' => 'd.dara',
            'email' => 'dara@example.com',
            'password' => Hash::make('password'),
        ]);
        Author::create(['user_id' => $user3->id]);
    }
}
