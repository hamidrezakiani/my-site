<?php

namespace App\Http\Requests\Site;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required',
        ];
    }

    public function attributes()
    {
        if (Request::all()['ln'] ?? 'en' == 'fa') {
            return [
                'email' => 'ایمیل',
                'password' => 'رمز عبور'
            ];
        } elseif (Request::all()['ln'] ?? 'en' == 'ar') {
            return [
                'email' => 'ایمیل',
                'password' => 'رمز عبور'
            ];
        } else {
            return [
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
                'regex' => '.فرمت :attribute صحیح نمیباشد'
            ];
        } elseif (Request::all()['ln'] ?? 'en' == 'ar') {
            return [
                'required' => '.فیلد :attribute ضروری است',
                'regex' => '.فرمت :attribute صحیح نمیباشد'
            ];
        } else {
            return [
                'required' => 'The :attribute field is required.',
                'regex' => 'The :attribute format is invalid.'
            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $validator->getMessageBag()->add('login', true);
        $validator->getMessageBag()->add('auth', false);
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
