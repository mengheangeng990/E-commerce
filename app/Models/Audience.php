<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Audience extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    /**
     * Get the user that owns the audience.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the articles for the audience.
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_audience');
    }

    /**
     * Get the comments for the audience.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
