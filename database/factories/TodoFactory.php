<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'body' => $faker->paragraph(3),
        'user_id' => random_int(1, User::all()->count()),
        'status_id' => random_int(1, 3),
        'updated_at' => now(),
        'created_at' => now(),
    ];
});
