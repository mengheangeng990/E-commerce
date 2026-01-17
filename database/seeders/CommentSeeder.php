<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Audience;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sokUser = User::where('name', 'sok123')->first();
        $samnangUser = User::where('name', 'samnang')->first();
        $saoUser = User::where('name', 'sao')->first();
        $veasnaUser = User::where('name', 'veasna')->first();

        $climate = Article::where('title', 'Climate changes in the last 3 years')->first();
        $saoAuthor = Author::whereHas('user', fn($q) => $q->where('name', 'sao'))->first();
        $samnangAudience = Audience::whereHas('user', fn($q) => $q->where('name', 'samnang'))->first();
        $quantum = Article::where('title', 'Quantum computers, is it coming?')->first();

        // Sok comments on his article
        Comment::create([
            'content' => 'Thank you to all the subscribers',
            'user_id' => $sokUser->id,
            'commentable_type' => Article::class,
            'commentable_id' => $climate->id,
        ]);

        // Samnang comments on Sao
        Comment::create([
            'content' => 'Your article is amazing',
            'user_id' => $samnangUser->id,
            'commentable_type' => Author::class,
            'commentable_id' => $saoAuthor->id,
        ]);

        // Sao comments on Samnang
        Comment::create([
            'content' => 'Welcome to read my article',
            'user_id' => $saoUser->id,
            'commentable_type' => Audience::class,
            'commentable_id' => $samnangAudience->id,
        ]);

        // Veasna comments on quantum article
        Comment::create([
            'content' => 'I can\'t wait this thing happening',
            'user_id' => $veasnaUser->id,
            'commentable_type' => Article::class,
            'commentable_id' => $quantum->id,
        ]);
    }
}
