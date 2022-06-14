<?php

use App\Membership;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m =  new Membership();
        $m->name = 'Scholarship';
        $m->save();

        $m =  new Membership();
        $m->name = 'Stander';
        $m->save();

        $m =  new Membership();
        $m->name = 'Contract';
        $m->save();

        $m =  new Membership();
        $m->name = 'Other';
        $m->save();
    }
}
