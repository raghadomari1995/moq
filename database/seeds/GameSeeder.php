<?php

use App\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $game = new Game();
        $game->group_id  = 1;
        $game->user_id  = 1;
        $game->opponent_team = 'opponent team';
        $game->city_id  = 1;
        $game->area = 'Amman';
        $game->address = 'Amman';
        $game->date = '1992-07-15';
        $game->our_score = '5';
        $game->opponent_score = '3';
        $game->completed = 1;
        $game->translateOrNew('en')->name = 'Game One';
        $game->translateOrNew('ar')->name = 'Game One';
        $game->save();
    }
}
