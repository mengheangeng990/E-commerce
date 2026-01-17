<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sok = Author::whereHas('user', fn($q) => $q->where('name', 'sok123'))->first();
        $sao = Author::whereHas('user', fn($q) => $q->where('name', 'sao'))->first();
        $dara = Author::whereHas('user', fn($q) => $q->where('name', 'd.dara'))->first();

        Article::create(['title' => 'Climate changes in the last 3 years', 'content' => 'Content here', 'author_id' => $sok->id]);
        Article::create(['title' => 'Global warming is in its critical stage', 'content' => 'Content here', 'author_id' => $sok->id]);
        Article::create(['title' => 'Computers in the next generation', 'content' => 'Content here', 'author_id' => $sao->id]);
        Article::create(['title' => 'Quantum computers, is it coming?', 'content' => 'Content here', 'author_id' => $sao->id]);
        Article::create(['title' => 'Chemistry in nature form', 'content' => 'Content here', 'author_id' => $dara->id]);
        Article::create(['title' => 'The origin of water', 'content' => 'Content here', 'author_id' => $dara->id]);
    }
}
