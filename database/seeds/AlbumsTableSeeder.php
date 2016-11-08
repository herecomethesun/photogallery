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
            factory(Album::class, 20)->make()
        );

        $albums->first()->images()->saveMany(
            factory(App\Image::class, 20)->make()
        );

        $albums->each(function($album) {
            $album->images()->saveMany(
                factory(App\Image::class, 2)->make()
            );
        });
    }
}
