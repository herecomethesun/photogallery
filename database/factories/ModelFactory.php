<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/**
 * Collections
 */
$factory->define(App\Collection::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
    ];
});

/**
 * Album
 */
$factory->define(App\Album::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'collection_id' => 1,
    ];
});

/**
 * Article
 */
$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->realText(500),
        'published' => $faker->boolean(),
        'thumbnail_url' => $faker->imageUrl(),
        'meta_description' => $faker->sentence,
        'meta_keywords' => implode(',', $faker->words()),
        'created_at' => $faker->dateTimeBetween('-1 month'),
    ];
});

/**
 * Image
 */
$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
        'path' => $faker->imageUrl(),
        'thumbnail_path' => $faker->imageUrl(500, 1000),
    ];
});