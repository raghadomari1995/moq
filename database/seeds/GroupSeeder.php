<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Group();
        $group->name = 'Group 1';
        $group->age = 10;
        $group->grouptypes_id= 1;
        $group->save();

        $group = new Group();
        $group->name = 'Group 2';
        $group->age = 10;
        $group->grouptypes_id= 1;
        $group->save();

        $group = new Group();
        $group->name = 'Group 3';
        $group->age = 10;
        $group->grouptypes_id= 2;
        $group->save();

        $group = new Group();
        $group->name = 'Group 4';
        $group->age = 10;
        $group->grouptypes_id= 3;
        $group->save();

        $group = new Group();
        $group->name = 'Group 5';
        $group->age = 10;
        $group->grouptypes_id= 4;
        $group->save();

        
    }
}
