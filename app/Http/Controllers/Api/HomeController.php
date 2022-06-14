<?php

namespace App\Http\Controllers\Api;

use App\ContactUs;
use App\Game;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\PhoneVerification;
use App\Service;
use App\ServiceOption;
use App\Slider;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Resources\ServiceOptionResource;
use App\Http\Resources\ServiceResource;

class HomeController extends Controller
{
    public $success = 200;
    public $error = 422;
    public $messages = [
        'updated_successfully'=>[
            'ar' => 'تم التعديل بنجاح ',
            'en' => 'updated successfully',
        ],
        'phone_verification_sent_successfully'=>[
            'ar' => 'تم ارسال كود التفعيل بنجاح  ',
            'en' => 'phone verification code sent successfully',
        ],
        'message_sent_successfully'=>[
            'ar' => 'تم ارسال رسالتك  بنجاح  ',
            'en' => 'Message sent successfully',
        ],
        'phone_wrong'=>[
            'ar' => '  رقم الهاتف محجوز',
            'en' => 'phone number is taken',
        ],

    ];

    public function home(Request $request){
        $slider = Slider::OrderBy('id','desc')->get();
        $kbg1_public_games = Game::where([
            ['active',1],['company_id',1],['start_date','<=',Carbon::now()->toDateString()],['end_date','>=',Carbon::now()->toDateString()],
            ['working_hours_from','<=',Carbon::now()->format('H:i')],['working_hours_to','>=',Carbon::now()->format('H:i')]
        ])->orderBy('id','desc')->get();
        return response(['status' => config('global.success_code'), 'data' => [
            'slider'=>$slider,
            'kbg1_public_games'=>GameResource::collection($kbg1_public_games)->groupBy('category_name'),
        ]]);
    }//end home

    public function contact_us(Request $request){
        $contact = ContactUs::create($request->all());
        return response(['status' => config('global.success_code'), 'data' => [trans('messages.added_successfully')]]);
    }//end contact_us


    public function global_values(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        return response(['status' => $this->success, 'data' => [
            'commission'=>      setting('commission',$lang),
            'about_muyawma'=>   setting('about_muyawma',$lang),
            'privacy_policy'=>  setting('privacy_policy',$lang),
            'terms_of_use'=>    setting('terms_of_use',$lang),
            'facebook'=>        setting('facebook',$lang),
            'twitter'=>         setting('twitter',$lang),
            'instagram'=>       setting('instagram',$lang),
            'telegram'=>        setting('telegram',$lang),
            'tiktok'=>          setting('tiktok',$lang),
            'linkedin'=>        setting('linkedin',$lang),

        ]]);

    }//end global_values

    public function slider(){
        $slider = Slider::OrderBy('id','desc')->get();
        return response(['status' => $this->success, 'data' => $slider]);

    }//end slider

    public function send_phone_code(Request $request){
        $lang = ($request->hasHeader('lang'))?$request->header('lang'):'en';
        $type = $request->type;
        $user = User::where('phone',$request->phone)->get();

        if (count($user)){
            return response(['status' => $this->error, 'errors' => [$this->messages['phone_wrong'][$lang]]],$this->error);
        }
        //send phone verification code
            $code = 1111;
        //$phone_verification->code = mt_rand(1000,9999);
        return response(['status' => $this->success, 'data' => ['code'=>$code]]);
    }//end send_phone_code




}
