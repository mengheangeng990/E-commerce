<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Audience;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Get all articles of author Sao
    public function getArticlesOfSao()
    {
        $sao = Author::whereHas('user', fn($q) => $q->where('name', 'sao'))->first();
        return $sao->articles;
    }

    // Get all audiences of article "Climate changes in the last 3 years"
    public function getAudiencesOfClimateArticle()
    {
        $article = Article::where('title', 'Climate changes in the last 3 years')->first();
        return $article->audiences;
    }

    // Get all audiences of author Sok (using Has Many Through)
    public function getAudiencesOfSok()
    {
        $sok = Author::whereHas('user', fn($q) => $q->where('name', 'sok123'))->first();
        return $sok->audiences;
    }

    // Get all comments of audience Samnang
    public function getCommentsOfSamnang()
    {
        $samnang = Audience::whereHas('user', fn($q) => $q->where('name', 'samnang'))->first();
        return $samnang->comments;
    }

    // Get all comments which include topic that each comment is on
    public function getAllCommentsWithTopics()
    {
        return \App\Models\Comment::with('commentable')->get();
    }
}
