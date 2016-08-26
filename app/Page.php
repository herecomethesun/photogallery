<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'content',
        'meta_keywords',
        'meta_description',
        'template',
    ];

    /**
     * Find page by name
     *
     * @param $name
     * @return mixed
     */
    public static function findByName($name)
    {
        return static::whereName($name)->firstOrFail();
    }

    /**
     * Page route name
     *
     * @return string
     */
    public function getRouteAttribute()
    {
        return "page.{$this->name}";
    }
}
