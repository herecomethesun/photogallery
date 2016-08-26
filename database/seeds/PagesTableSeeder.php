<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title' => 'О дизайнере',
            'name' => 'designer',
        ]);

        Page::create([
            'title' => 'О бренде',
            'name' => 'brand',
        ]);
    }
}
