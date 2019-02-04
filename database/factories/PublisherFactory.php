<?php

use Faker\Generator as Faker;

$factory->define(App\Publisher::class, function (Faker $faker) {
  $publisherName = $faker->company;
    return [
      'name'  => $publisherName,
      'slug'  => str_slug($publisherName,'-'),
      'address'  => $faker->address,
      'web'      => $faker->domainName,
      'email'    => $faker->companyEmail
    ];
});
