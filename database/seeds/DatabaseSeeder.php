<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProjectSeeder::class,
            SkillSeeder::class,
            WorkSeeder::class,
            CompanySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            TodoSeeder::class,
            StatusSeeder::class,
            ActivitySeeder::class,
            MessageSeeder::class,
        ]);
    }
}
