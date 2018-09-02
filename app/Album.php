<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title',
        'description',
        'cover',
        'cover_image_id',
    ];

    /**
     * Album's collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    /**
     * Album images
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return mixed
     */
    public function getCoverAttribute()
    {

        if ($this->attributes['cover_image_id'] > 0) {
            foreach ($this->images as $image){
                if($image->attributes['id'] == $this->attributes['cover_image_id']){
                    return $image->attributes['thumbnail_path'];
                }
            }
            return $this->images->first()->thumbnail_path;
        } else{
            return $this->images->first()->thumbnail_path;
        }

        return null;
    }
}
