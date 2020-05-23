<?php

use App\Models\Project;
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
            $random_user1 = Skill::inRandomOrder()
                ->where('id', '<>', $user->id)
                ->take(3)
                ->pluck('id')
                ->toArray();

            $random_user2 = Project::inRandomOrder()
                ->where('id', '<>', $user->id)
                ->take(3)
                ->pluck('id')
                ->toArray();

            $random_user3 = User::inRandomOrder()
                ->where('id', '<>', $user->id)
                ->take(3)
                ->pluck('id')
                ->toArray();

            $user->skills()->attach($random_user1);
            $user->projects()->attach($random_user2);
            $user->follows()->attach($random_user3);
        }
    }
}
