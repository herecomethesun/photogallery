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
        $collection->albums()->saveMany(
            factory(Album::class, 2)->make()
        );
    }
}
