<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = config('translatable.locales');

        $settings = [
            [
                'display_name' => 'website title',
                'key' => 'website_title',
                'type' => 'text',
                'values' => [
                    'ar'=>'moqaidah' ,
                    'en'=>'moqaidah'
                ]
                
            ],
            [
                'display_name' => 'Email Addres for Contact us Page',
                'key' => 'email_address',
                'type' => 'text',
                'values' => [
                    'ar'=>'info@moqaidah.com' ,
                    'en'=>'info@moqaidah.com'
                ]
                
            ],
            [
                'display_name' => 'Slider Text 1',
                'key' => 'slider_1',
                'type' => 'text',
                'values' => [
                    'ar'=>'من بريق الشاي' ,
                    'en'=>'من بريق الشاي'
                ]
                
            ],

            [
                'display_name' => 'Slider Text 2',
                'key' => 'slider_2',
                'type' => 'text',
                'values' => [
                    'ar'=>'الي السيارة' ,
                    'en'=>'الي السيارة'
                ]
                
            ],


        ];

        foreach ($settings as $se){
            $setting = new \App\Setting();
            $setting->display_name = $se['display_name'];
            $setting->key = $se['key'];
            $setting->type =$se['type'];
            $setting->save();
            foreach ($locales as $locale) {
                $setting->translateOrNew($locale)->value = $se['values'][$locale];
            }
            $setting->save();
        }//endforeach



    }
}
