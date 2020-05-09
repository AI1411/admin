<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('skills')->delete();
        \DB::table('skills')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Java',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'JavaScript',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'PHP',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'Python',
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => 'Ruby',
                ),
            5 =>
                array(
                    'id' => 6,
                    'name' => 'C言語',
                ),
            6 =>
                array(
                    'id' => 7,
                    'name' => 'SQL',
                ),
            7 =>
                array(
                    'id' => 8,
                    'name' => 'Rails',
                ),
            8 =>
                array(
                    'id' => 9,
                    'name' => 'Docker',
                ),
            9 =>
                array(
                    'id' => 10,
                    'name' => 'C#',
                ),
            10 =>
                array(
                    'id' => 11,
                    'name' => 'iOS',
                ),
            11 =>
                array(
                    'id' => 12,
                    'name' => 'Android',
                ),
            12 =>
                array(
                    'id' => 13,
                    'name' => 'Swift',
                ),
            13 =>
                array(
                    'id' => 14,
                    'name' => 'Laravel',
                ),
            14 =>
                array(
                    'id' => 15,
                    'name' => '機械学習',
                ),
            15 =>
                array(
                    'id' => 16,
                    'name' => 'DevOps',
                ),
            16 =>
                array(
                    'id' => 17,
                    'name' => 'AWS',
                ),
            17 =>
                array(
                    'id' => 18,
                    'name' => 'Golang',
                ),
            18 =>
                array(
                    'id' => 19,
                    'name' => 'GCP',
                ),
            19 =>
                array(
                    'id' => 20,
                    'name' => 'Azure',
                ),
        ));
    }
}
