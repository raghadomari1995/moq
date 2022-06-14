<?php

use App\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $player = new Player();
        $player->code = '1000';
        $player->name = 'Alaa Albawaneh';
        $player->date_of_birth = '1992-07-15';
        $player->email = 'bawanehcoder@live.com';
        $player->phone = '077777777';
        
        $player->country_id = 112;
        $player->city_id = 1;
        $player->gender = 'male';
        $player->membership_id = 1;
        $player->school_name = 'bab ammman';
        $player->address = 'Amman';
        $player->allergies = 'No';
        $player->medical_conditions = 0;
        $player->traning_location = 'Amman';
        $player->save();
    }
}
