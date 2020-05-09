<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        \DB::table('roles')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => '管理者',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => '一般会員',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'プレミアム会員',
                ),
        ));
    }
}
