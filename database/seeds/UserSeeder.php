<?php

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();

        $users = User::all();

        foreach ($users as $user) {
            $random_user = Skill::inRandomOrder()
                ->where('id', '<>', $user->id)
                ->take(3)
                ->pluck('id')
                ->toArray();

            $user->skills()->attach($random_user);
        }
    }
}
