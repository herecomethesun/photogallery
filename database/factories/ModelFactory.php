<?php

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
 * Image
 */
$factory->define(App\Image::class, function (Faker\Generator $faker) {

    $imgSizes = [
        [150, 300],
        [150, 300],
        [300, 600]
    ];

    $size = $imgSizes[array_rand($imgSizes)];

    return [
        'path' => $faker->imageUrl(600, 1200),
        'thumbnail_path' => $faker->imageUrl($size[0], $size[1]),
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
