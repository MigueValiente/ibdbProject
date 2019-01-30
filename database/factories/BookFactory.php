<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    $title = ucfirst($faker->words(rand(1,10), true));
    return [
        'user_id'       => random_int(1,2),
        'title'         => $title,
        'slug'          => str_slug($title, "-"),
        'author'        => $faker->firstName() . " " . $faker->lastName(),
        'description'   => $faker->text(500)
    ];
});
