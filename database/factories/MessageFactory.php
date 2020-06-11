<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    $users = User::all()->count();
    return [
        'title' => $faker->text(20),
        'body' => $faker->paragraph(3),
        'user_id' => random_int(1, $users),
        'read_at' => null,
        'to' => random_int(1, $users),
        'created_at' => $faker->dateTime
    ];
});
