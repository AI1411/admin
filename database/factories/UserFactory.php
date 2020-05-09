<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Models\Work;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(),
        'company_id' => random_int(1, Company::all()->count()),
        'role_id' => 2,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'age' => random_int(22, 35),
        'work_id' => random_int(1, Work::all()->count()),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
