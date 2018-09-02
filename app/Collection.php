<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'cover_image_id'
    ];

    /**
     * Collection albums
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
