<?php
use Illuminate\Support\Facades\Hash;

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
        'name' => 'Lab3',
        'email' => 'admin',
        'level' => '1',
        'password' => Hash::make('helefante'),
        'pass' => 'helefante',
        'user' => '1',
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
    $caliber = array('16', '15', '14', '12', '10', '3/16"', '1/4"');
    $types = array('produccion', 'maquila');
    $design = array('nuevo', 'existente');
    $measure = array('internas', 'externas');

    return [
        'quotation' => $faker->regexify('[1-9]{1}'),
        'description' => $faker->text(50),
        'type' => $types[array_rand($types)],
        'design' => $design[array_rand($design)],
        'caliber' => $caliber[array_rand($caliber)],
        'measureType' => $measure[array_rand($measure)],
        'pieces' => $faker->randomDigit,
        'height' => $faker->randomFloat(2, 0, 1),
        'length' => $faker->randomFloat(2, 0, 1),
        'width' => $faker->randomFloat(2, 0, 1),
    ];
});

$factory->define(App\Quotation::class, function (Faker\Generator $faker) {
    $status = array('pendiente');
    $types = array('terminado', 'produccion');

    return [
        'type' => $types[array_rand($types)],
        'status' => $status[array_rand($status)],
        'amount' => $faker->numberBetween(100,200),
        'client' => $faker->numberBetween(1,10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    $types = array('terminado', 'produccion','hola', 'cola');

    return [
        'name' => $types[array_rand($types)],
    ];
});

$factory->define(App\Models\Hercules\HItem::class, function (Faker\Generator $faker) {
    $design = array('m', 'l', 'kg', 'pieza');
    $family = array('soldadura', 'fondeo', 'vestido', 'pintura', 'montaje');
    $rand_keys = array_rand($design, 2);

    return [
        'description' => $faker->sentence(3),
        'caliber' => $faker->randomDigit,
        'unity' => $design[array_rand($design)],
        'family' => serialize([$family[$rand_keys[0]], $family[$rand_keys[1]]]),
        'price' => $faker->randomFloat(2, 0, 500),
        'weight' => $faker->randomFloat(2, 0, 50),
    ];
});
