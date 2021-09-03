<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tasks;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Tasks::class, function (Faker $faker) {
    return [
        'category_id' => $faker->category_id,
        'body' => $faker->body,
        'status' => $faker->status,
        'priority' => $faker->priority,
    ];
});
