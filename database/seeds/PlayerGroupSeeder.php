<?php

use App\GroupUser;
use Illuminate\Database\Seeder;

class PlayerGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //assign player to group
        $group_user = new GroupUser();
        $group_user->group_id = 1;
        $group_user->groupable_id = 1;
        $group_user->groupable_type = 'App\Player';
        $group_user->save();
    }
}
