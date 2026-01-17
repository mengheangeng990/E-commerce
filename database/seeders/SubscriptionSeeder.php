<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Audience;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samnang = Audience::whereHas('user', fn($q) => $q->where('name', 'samnang'))->first();
        $veasna = Audience::whereHas('user', fn($q) => $q->where('name', 'veasna'))->first();
        $ratana = Audience::whereHas('user', fn($q) => $q->where('name', 'ratana'))->first();

        $computers = Article::where('title', 'Computers in the next generation')->first();
        $chemistry = Article::where('title', 'Chemistry in nature form')->first();
        $origin = Article::where('title', 'The origin of water')->first();
        $climate = Article::where('title', 'Climate changes in the last 3 years')->first();
        $quantum = Article::where('title', 'Quantum computers, is it coming?')->first();
        $warming = Article::where('title', 'Global warming is in its critical stage')->first();

        // Samnang subscribes to computers, chemistry, origin
        $samnang->articles()->attach([$computers->id, $chemistry->id, $origin->id]);

        // Veasna subscribes to climate, origin, quantum
        $veasna->articles()->attach([$climate->id, $origin->id, $quantum->id]);

        // Ratana subscribes to climate, warming
        $ratana->articles()->attach([$climate->id, $warming->id]);
    }
}
