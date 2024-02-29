<?php

namespace App\Http\Requests\Site;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200',
            'email' => 'required|unique:users,email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|confirmed|min:8',
        ];
    }
    public function attributes()
    {
        if (Request::all()['ln'] ?? 'en' == 'fa') {
            return [
                'name' => 'نام',
                'email' => 'ایمیل',
                'password' => 'رمز عبور'
            ];
        } elseif (Request::all()['ln'] ?? 'en' == 'ar') {
            return [
                'name' => 'نام',
                'email' => 'ایمیل',
                'password' => 'رمز عبور'
            ];
        } else {
            return [
                'name' => 'name',
                'email' => 'email',
                'password' => 'password'
            ];
        }
    }

    public function messages()
    {
        if (Request::all()['ln'] ?? 'en' == 'fa') {
            return [
                'required' => '.فیلد :attribute ضروری است',
                'max' => '.فیلد :attribute نمیتواند بیشتر از :max کاراکتر باشد',
                'min' =>  '.فیلد :attribute نمیتواند کمتر از :min کاراکتر باشد',
                'regex' => '.فرمت :attribute صحیح نمیباشد',
                'confirmed' => '.رمز های عبور با هم تطابق ندارند',
                'email' => 'این ایمیل قبلا استفاده شده'
            ];
        } elseif (Request::all()['ln'] ?? 'en' == 'ar') {
            return [
                'required' => '.فیلد :attribute ضروری است',
                'max' => '.فیلد :attribute نمیتواند بیشتر از :max کاراکتر باشد',
                'min' =>  '.فیلد :attribute نمیتواند کمتر از :min کاراکتر باشد',
                'regex' => '.فرمت :attribute صحیح نمیباشد',
                'confirmed' => '.رمز های عبور با هم تطابق ندارند',
                'email' => 'این ایمیل قبلا استفاده شده'
            ];
        } else {
            return [
                'required' => 'The :attribute field is required.',
                'max' => 'The :attribute must not be greater than :max characters.',
                'min' => 'The :attribute must be at least :min characters.',
                'regex' => 'The :attribute format is invalid.',
                'confirmed' => 'The password confirmation does not match.',
                'unique' => 'The :attribute has already been taken.'
            ];
        }
    }
    protected function failedValidation(Validator $validator)
    {
        $validator->getMessageBag()->add('register', true);
        $validator->getMessageBag()->add('auth', false);
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
