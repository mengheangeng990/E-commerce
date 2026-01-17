<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id'];

    /**
     * Get the author that owns the article.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the audiences for the article.
     */
    public function audiences(): BelongsToMany
    {
        return $this->belongsToMany(Audience::class, 'article_audience');
    }

    /**
     * Get the comments for the article.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
