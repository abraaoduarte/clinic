<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => 'Rua '.$faker->name,
        'number_address' => $faker->randomDigit,
        'email' => $faker->unique()->safeEmail,
        'zipcode' => $faker->postcode,
        'birthday' => $faker->dateTimeBetween('-5 years'),
        'city' => $faker->word,
        'state' => str_random(2),
        'country' => $faker->word,
        'cpf' => $faker->unique()->numberBetween(0,1000),
        'crm' => $faker->unique()->numberBetween(0,1000),
        'gender' => $faker->boolean($chanceOfGettingTrue = 50),
        'speciality' => $faker->name,
        'hospital' => $faker->name,
    ];
});
