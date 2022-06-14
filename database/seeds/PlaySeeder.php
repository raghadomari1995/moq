<?php

use App\PlayerMinute;
use Illuminate\Database\Seeder;

class PlaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $play = new PlayerMinute();
        $play->game_id = 1;
        $play->player_id = 1 ;
        $play->in_minute = '10' ;
        $play->in_second = '00' ;
        $play->out_minute = '50' ;
        $play->out_second = '00' ;
        $play->goals = '3' ;
        $play->save();
    }
}
