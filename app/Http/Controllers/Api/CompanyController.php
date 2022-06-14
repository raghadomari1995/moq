<?php

namespace App\Http\Controllers\Api;

use App\Code;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function access_company(Request $request){
        $code = Code::where('code',$request->code)->first();
        if ($code){
            //check if code is used
            if ($code->user_id){
                return response(['status' => config('global.error_code'), 'errors' => [trans('messages.code_is_taken')]],config('global.error_code'));
            }else{
                //assign to this user
                $code->user_id = auth()->id();
                $code->assign_date = Carbon::now();
                $code->status = 1;
                $code->save();
                return response(['status' => config('global.success_code'), 'data' => [trans('messages.added_successfully')]]);

            }
        }else{
            return response(['status' => config('global.error_code'), 'errors' => [trans('messages.code_is_wrong')]],config('global.error_code'));
        }
    }
}
