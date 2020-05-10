<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'body' => $faker->paragraph(3),
        'progress' => random_int(1,10) . '0',
        'status_id' => random_int(1,3),
    ];
});
