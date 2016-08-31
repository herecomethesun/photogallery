<?php

use App\Album;
use App\Collection;
use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = Collection::all()->first();

        $albums = $collection->albums()->saveMany(
            factory(Album::class, 10)->make()
        );

        $albums->each(function($album) {
            $images = factory(\App\Image::class, 3)->make();
            $album->images()->saveMany($images);
        });
    }
}
