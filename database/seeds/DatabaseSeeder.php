<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
         $this->call(CountrySeeder::class);
         $this->call(UserSeeder::class);
         $this->call(SettingSeeder::class);
         $this->call(GroupTypesSeeder::class);
         $this->call(MembershipSeeder::class);
         $this->call(GroupSeeder::class);
         $this->call(PlayerSeeder::class);
         $this->call(PlayerGroupSeeder::class);
         $this->call(GameSeeder::class);
         $this->call(PlaySeeder::class);
         $this->call(AdvertisingSeeder::class);
         $this->call(PageSeeder::class);
    }
}
