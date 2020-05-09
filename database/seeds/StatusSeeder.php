<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('statuses')->delete();
        \DB::table('statuses')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => '優先度低',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => '優先度中',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => '優先度高',
                ),
        ));
    }
}
