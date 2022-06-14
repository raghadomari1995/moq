<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p= new Page();
        $p->slug = 'about';
        
        $p->translateOrNew('en')->name = 'About Us';
        $p->translateOrNew('ar')->name = 'من نحن';

        $p->save();

        $p= new Page();
        $p->slug = 'privcy';
        
        $p->translateOrNew('en')->name = 'Privacy Policy';
        $p->translateOrNew('ar')->name = 'سياسة الخصوصية';


        $p->save();

    }
}
