<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    /**
     * Get the user that owns the author.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the articles for the author.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Get the audiences for the author through articles.
     */
    public function audiences(): HasManyThrough
    {
        return $this->hasManyThrough(Audience::class, Article::class);
    }

    /**
     * Get the comments for the author.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
