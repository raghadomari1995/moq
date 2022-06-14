<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\NotificationResource;
use App\UserRate;
use App\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        'rated_successfully'=>[
            'ar' => 'تم  التقييم بنجاح  ',
            'en' => 'Rated successfully',
        ],

    ];


    public function update_profile(UpdateProfileRequest $request){
        $user = auth()->user();
        $data = $request->all();
        $user->update($data);
        return response(['status' => config('global.success_code'), 'data' => [trans('messages.updated_successfully')]]);
    }//end update_profile

    public function change_password(Request $request){
        $user = auth()->user();
        if (Hash::check($request->old_password,$user->password)){
            $user->password = $request->new_password;
            $user->save();
            return response(['status' => config('global.success_code'), 'data' => [trans('messages.updated_successfully')]]);
        }else{
            return response(['status' => config('global.error_code'), 'errors' => [trans('messages.wrong_password')]],config('global.error_code'));
        }
    }//end change_password

    public function new_password(Request $request){
        $user = auth()->user();
        $user->password = $request->new_password;
        $user->save();
        return response(['status' => config('global.success_code'), 'data' => [trans('messages.updated_successfully')]]);
    }//end new_password


    public function update_device_token(Request $request){
        $user = auth()->user();
        $user->device_token = $request->device_token;
        $user->save();
        return response(['status' => config('global.success_code'), 'data' => [trans('messages.updated_successfully')]]);
    }//end update_device_token

    public function getUserDetails(Request $request){
        $user = auth()->user();
        return response(['status' => config('global.success_code'), 'data' => [new UserResource($user) ]]);
    }

    public function getnotifications(Request $request){
        $notifications = Notification::where('user_id',\Auth::id())->orderBy('id','desc')->get();
        foreach ($notifications as $notification){
            $notification->read = 1;
            $notification->save();
        }//end foreach
        return response(['status' => config('global.success_code'), 'data' => NotificationResource::collection($notifications)]);
    }//end getnotifications






}
