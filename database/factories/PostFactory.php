<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'content'	=>$faker->text(),
        'slug'=> str_replace(' ', '-', strtolower($faker->sentence(6)))
    ];
});
