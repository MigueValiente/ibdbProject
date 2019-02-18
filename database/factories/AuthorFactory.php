<?php

use Faker\Generator as Faker;
use App\Author;

$factory->define(Author::class, function (Faker $faker) {
    $name = $faker->firstName() . " " . $faker->lastName();
    return [
        'name' => $name,
        'slug' => str_slug($name, '-'),
        'bio'  => $faker->text(500)
    ];
});
