<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreContactRequest extends FormRequest
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
        // dd();
        return [
            'name' => 'required|max:200',
            'subject' => 'required|max:200|min:3',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:200',
            'message' => 'required|min:2|max:2000'
        ];
    }

    public function attributes()
    {
        if (Request::all()['ln'] == 'fa') {
          return [
             'name' => 'نام',
             'subject' => 'موضوع',
             'email' => 'ایمیل',
             'message' => 'پیام'
          ];
        }elseif(Request::all()['ln'] == 'ar'){
            return [
                'name' => 'الاسم',
                'subject' => 'العنوان',
                'email' => 'البريد الإلكتروني',
                'message' => 'الرسالة'
            ];
        }else{
            return [
                'name' => 'name',
                'subject' => 'subject',
                'email' => 'email',
                'message' => 'message'
            ];
        }
    }

    public function messages()
    {
        if(Request::all()['ln'] == 'fa')
        {
            return [
                'required' => 'فیلد :attribute ضروری است.',
                'max' => 'فیلد :attribute نمیتواند بیشتر از :max کاراکتر باشد.',
                'min' =>  'فیلد :attribute نمیتواند کمتر از :min کاراکتر باشد.',
                'regex' => 'فرمت :attribute صحیح نمیباشد.',
            ];
        }
        elseif(Request::all()['ln'] == 'ar')
        {
            return [
                'required' => 'حقل :attribute مطلوب.',
                'max' => 'يجب ألا يزيد :attribute عن :max أحرف.',
                'min' =>  'يجب أن يكون :attribute :min حرفًا على الأقل.',
                'regex' => 'تنسيق :attribute غير صالح.',
            ];
        }
        else
        {
            return [
                'required' => 'The :attribute field is required.',
                'max' => 'The :attribute must not be greater than :max characters.',
                'min' => 'The :attribute must be at least :min characters.',
                'regex' => 'The :attribute format is invalid.'
            ];
        }
    }

}
