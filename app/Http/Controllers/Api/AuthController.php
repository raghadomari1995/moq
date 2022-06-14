<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Resources\UserResource;
use App\PhoneVerification;
use App\SocialUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Builder;



class AuthController extends Controller
{
    public function send_phone_code(Request $request){
        $user = User::where('phone',$request->phone)->first();
        if ($user){
            return response(['status' => config('global.error_code'), 'errors' => [trans('messages.phone_is_taken')]],config('global.error_code'));
        }
        //send phone verification code
//        $code = mt_rand(1000,9999);
        $code = '0000';
//        sendPhoneVerificationCode($code,$request->phone);
        return response(['status' =>config('global.success_code'), 'data' => ['code'=>$code]]);
    }//end send_phone_code

    public function save_user(RegisterFormRequest $request){
        if ($request->register_type == 'social_media'){
            //search if user exists
            $social_user = SocialUser::where('social_key',$request->social_key)->first();
            if ($social_user){
                $user = User::findOrFail($social_user->user_id);
            }else{
                $user = User::create($request->all());
                $social = new SocialUser();
                $social->user_id = $user->id;
                $social->social_key = $request->social_key;
                $social->social_type = $request->social_type;
                $social->save();
            }//end inner else
        }else{
            $user = User::create($request->all());
        }
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['status' => config('global.success_code'), 'data' => [
            'token' => $accessToken,
            'user' => new UserResource(User::findOrFail($user->id))
        ]]);
    }//end save_user

    public function login(LoginFormRequest $request)
    {
        $user = User::where([
            ['phone', $request->phone]
        ])->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $accessToken = $user->createToken('authToken')->accessToken;

            return response(['status' => config('global.success_code'), 'data' => [
                'token' => $accessToken,
                'user' => new UserResource($user)
            ]]);
        }else{
            return response(['status' => config('global.error_code'), 'errors' => [trans('messages.incorrect_password')]],config('global.error_code'));

        }
    }//end login

    public function forgetPasswordSendOtp(Request $request){
        $user = User::where('phone',$request->phone)->first();
        if ($user){
            //send phone verification code
            $phone_verification = new PhoneVerification();
            $phone_verification->user_id = $user->id;
            $phone_verification->code = '0000';
//            $phone_verification->code = mt_rand(1000,9999);
            $phone_verification->save();
//            sendPhoneVerificationCode($phone_verification->code,$request->phone);
            return response(['status' => config('global.success_code'), 'data' => [trans('messages.code_sent_successfully')]]);
        }else{
            return response(['status' => config('global.error_code'), 'errors' => [trans('messages.phone_is_wrong')]],config('global.error_code'));
        }
    }//end forgetPasswordSendOtp

    public function check_forget_password_code(Request $request){
        $user = User::where('phone',$request->phone)->first();
        if ($user){
            $phone_code = PhoneVerification::where([
                ['user_id',$user->id],['code',$request->code]
            ])->first();
            if ($phone_code){
                $user->phone_verified = 1;
                $user->save();
                $accessToken = $user->createToken('authToken')->accessToken;
                $phone_code->delete();
                return response(['status' => config('global.success_code'), 'data' => ['token' => $accessToken,'user' => new UserResource($user) ]]);
            }else{
                return response(['status' => config('global.error_code'), 'errors' => [trans('messages.code_is_wrong')]],config('global.error_code'));
            }
        }else{
            return response(['status' => config('global.error_code'), 'errors' => [trans('messages.phone_is_wrong')]],config('global.error_code'));
        }
    }//end check_phone_code

    public function resend_code(Request $request){
        $user = User::where('phone',$request->phone)->first();
        if ($user){
            $phone_code = PhoneVerification::where([
                ['user_id',$user->id],['code',$request->code]
            ])->first();
            if ($phone_code) {
                $phone_code->delete();
            }
                //send new phone verification code
                $phone_verification = new PhoneVerification();
                $phone_verification->user_id = $user->id;
                $phone_verification->code = '0000';
//            $phone_verification->code = mt_rand(1000,9999);
                $phone_verification->save();
//            sendPhoneVerificationCode($phone_verification->code,$request->phone);
                return response(['status' => config('global.success_code'), 'data' => [trans('messages.code_sent_successfully')]]);
        }else{
            return response(['status' => config('global.error_code'), 'errors' => [trans('messages.phone_is_wrong')]],config('global.error_code'));
        }
    }//end resend_code





}
