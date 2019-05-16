<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $data = [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
    return [
        'title' => $data['title'],
        'body' => $data['description'],
        'category_id' => factory('App\Category')->create()->id,
        'meta' => json_encode([
            'title' => $data['title'],
            'description' => str_limit($data['description'] , 100),
            'keywords' => '',
            'author' => ''
        ]),
    ];
});
