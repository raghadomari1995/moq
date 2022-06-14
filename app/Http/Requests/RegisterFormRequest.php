<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->register_type == 'social_media'){
            return [];
        }else{
            return [
                'name' => 'required|min:5',
                'password' => 'required|min:6',
                'phone' => 'required|unique:users',
            ];
        }

    }

    public function messages()
    {
        $messages = [
            'ar'=>[
                'name.required' => 'اسم المستخدم مطلوب',
                'phone.required' => 'رقم الجوال  مطلوب',
                'name.unique' => 'اسم المستخدم محجوز مسبقا',
                'phone.unique' => 'رقم الجوال  محجوز مسبقا',
                'name.min' => 'اسم المستخدم لا يقل عن :min حروف',
                'password.min' => 'كلمة المرور  لا تقل عن :min حروف',
                'password.required' => 'كلمة المرور مطلوبة',
            ],
            'en'=>[
                'name.required' => 'The username is required',
                'password.required' => 'The password is required',
            ],
        ];
        return $messages[($this->hasHeader('lang'))?$this->header('lang'):'en'];
    }

    protected function failedValidation(Validator $validator) {
        $errors = [];
        foreach ($validator->errors()->all() as $error){
            $errors[] = $error;
        }//end foreach
        $response = [
            'status' => 422,
            'errors' => $errors
        ];
        throw new HttpResponseException(response()->json($response, 422));
    }

}
