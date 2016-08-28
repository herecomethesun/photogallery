<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'meta_keywords',
        'meta_description',
        'thumbnail_url',
        'published',
    ];

    /**
     * Scope published articles
     *
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
