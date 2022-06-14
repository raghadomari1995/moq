<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = '123456789';
        $user->type = 'admin';
        $user->phone = '0795401109';
        $user->city_id = 1;
        $user->save();
        $user->assignRole('super_admin');
        ////////////////////////////
    }
}
