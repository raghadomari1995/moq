<?php

use Illuminate\Database\Seeder;
use App\GroupType;

class GroupTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m =  new GroupType;
        $m->name = 'Boy';
        $m->save();

        $m =  new GroupType;
        $m->name = 'Girl';
        $m->save();

        $m =  new GroupType;
        $m->name = 'Foundation';
        $m->save();

        $m =  new GroupType;
        $m->name = 'Other';
        $m->save();
    }
}
