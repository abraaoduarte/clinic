<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => 'Rua '.$faker->name,
        'number_address' => $faker->randomDigit,
        'zipcode' => $faker->postcode,
        'birthday' => $faker->dateTimeBetween('-5 years'),
        'city' => $faker->word,
        'state' => str_random(2),
        'country' => $faker->word,
        'cpf' => $faker->unique( )->numberBetween(0,1000),
        'rg' => $faker->unique( )->numberBetween(0,1000),
        'description' => $faker->paragraph,
        'gender' => $faker->boolean($chanceOfGettingTrue = 50),
        'phone' => str_random(9),
        'smoker' => $faker->boolean($chanceOfGettingTrue = 1),
        'alcoholic' => $faker->boolean($chanceOfGettingTrue = 1),
        'bloodtype' => str_random(9),
    ];
});
