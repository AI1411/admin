<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Activity;
use App\Models\Project;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'body' => $faker->paragraph(3),
        'project_id' => random_int(1, Project::all()->count()),
        'user_id' => random_int(1, User::all()->count()),
    ];
});
