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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'contact' => $faker->name,
        'rfc' => $faker->regexify('[A-Z]{3}+[0-9]{6}+[A-Z]{2}'),
        'city' => $faker->city,
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    $status = array('finalizado', 'produccion', 'autorizado', 'pendiente');
    $teams = array('H1', 'H2', 'H3');
    $types = array('produccion', 'maquila');

    return [
        'team' => $teams[array_rand($teams)],
        'client' => $faker->name,
        'description' => $faker->text(50),
        'type' => $types[array_rand($types)],
        'design' => $faker->word,
        'caliber' => $faker->word,
        'measure' => $faker->word,
        'pieces' => $faker->randomDigit,
        'height' => $faker->randomFloat(2, 0, 1),
        'length' => $faker->randomFloat(2, 0, 1),
        'width' => $faker->randomFloat(2, 0, 1),
        'status' => $status[array_rand($status)],
    ];
});

$factory->define(App\Solicitude::class, function (Faker\Generator $faker) {
    $status = array('finalizado', 'produccion', 'autorizado', 'pendiente');
    $teams = array('H1', 'H2', 'H3');
    $types = array('produccion', 'maquila');

    return [
        'team' => $teams[array_rand($teams)],
        'client' => $faker->name,
        'description' => $faker->text(50),
    ];
});