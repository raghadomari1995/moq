<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $c = new Category();
        $c->translateOrNew('en')->name = 'Cars';
        $c->translateOrNew('ar')->name = 'سيارات';
        $c->in_home = '1';
        $c->save();

        $c = new Category();
        $c->translateOrNew('en')->name = 'Ford';
        $c->translateOrNew('ar')->name = 'فورد';
        $c->in_home = '1';
        $c->category_id = 1;
        $c->save();

        $c = new Category();
        $c->translateOrNew('en')->name = 'Cars';
        $c->translateOrNew('ar')->name = 'سيارات';
        $c->in_home = '1';
        $c->save();

        $c = new Category();
        $c->translateOrNew('en')->name = 'Ford';
        $c->translateOrNew('ar')->name = 'فورد';
        $c->in_home = '1';
        $c->category_id = 1;
        $c->save();

        

        DB::table("advertisings")->insert([
            'name' => 'ford ford ford ford ford ford ',
            'price' => '11000',
            'status' => '1',
            'status2' => '1',
            'des' => 'some text here',
            'year' => '2018',
            'color' => 'Black',
            'type' => '1',
            'user_id' => '1',
            'category_id' => '2',
            'city_id' => '1',
            
        ]);

        DB::table("advertisings")->insert([
            'name' => 'ford ford ford ford ford ford ',
            'price' => '11000',
            'status' => '4',
            'status2' => '2',
            'des' => 'some text here',
            'year' => '2018',
            'color' => 'Black',
            'type' => '2',
            'user_id' => '1',
            'city_id' => '1',
            'category_id' => '2',
            
        ]);
        DB::table("advertisings")->insert([
            'name' => 'ford ford ford ford ford ford ',
            'price' => '11000',
            'status' => '1',
            'status2' => '1',
            'des' => 'some text here',
            'year' => '2018',
            'color' => 'Black',
            'type' => '1',
            'user_id' => '1',
            'city_id' => '1',
            'category_id' => '2',
            
        ]);

        DB::table("advertisings")->insert([
            'name' => 'ford ford ford ford ford ford ',
            'price' => '11000',
            'status' => '4',
            'status2' => '2',
            'des' => 'some text here',
            'year' => '2018',
            'color' => 'Black',
            'type' => '2',
            'user_id' => '1',
            'city_id' => '1',
            'category_id' => '2',
            
        ]);
        DB::table("advertisings")->insert([
            'name' => 'ford ford ford ford ford ford ',
            'price' => '11000',
            'status' => '1',
            'status2' => '1',
            'des' => 'some text here',
            'year' => '2018',
            'color' => 'Black',
            'type' => '1',
            'user_id' => '1',
            'city_id' => '1',
            'category_id' => '2',
            
        ]);

        DB::table("advertisings")->insert([
            'name' => 'ford ford ford ford ford ford ',
            'price' => '11000',
            'status' => '4',
            'status2' => '2',
            'des' => 'some text here',
            'year' => '2018',
            'color' => 'Black',
            'type' => '2',
            'user_id' => '1',
            'city_id' => '1',
            'category_id' => '2',
            
        ]);
        DB::table("advertisings")->insert([
            'name' => 'ford ford ford ford ford ford ',
            'price' => '11000',
            'status' => '1',
            'status2' => '1',
            'des' => 'some text here',
            'year' => '2018',
            'color' => 'Black',
            'type' => '1',
            'user_id' => '1',
            'city_id' => '1',
            'category_id' => '2',
            
        ]);

        DB::table("advertisings")->insert([
            'name' => 'ford ford ford ford ford ford ',
            'price' => '11000',
            'status' => '4',
            'status2' => '2',
            'des' => 'some text here',
            'year' => '2018',
            'color' => 'Black',
            'type' => '2',
            'user_id' => '1',
            'city_id' => '1',
            'category_id' => '2',
            
        ]);

    }
}
