<?php

use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('works')->delete();
        \DB::table('works')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Webエンジニア',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'デザイナー',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'インフラエンジニア',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'ソフトウェアエンジニア',
                ),
        ));
    }
}
