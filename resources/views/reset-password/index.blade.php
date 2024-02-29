@extends('master')

@section('content')

@php
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa'||true)
     {
     $langFlag = 'fa';
     $lang = '_fa';
     $langUrl = '?ln=fa';
     }
   elseif(isset($_GET['ln']) && $_GET['ln'] == 'ar')
     {
     $langFlag = 'ar';
     $lang = '_ar';
     $langUrl = '?ln=ar';
     $successMessage = 'پیام شما با موفقیت ارسال شد';
     }
   else
     {
        $lang = '';
     $langFlag = 'en';
     $langUrl = '';
     $successMessage = 'Your message has been successfully sent';
    }

     $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
  {
      $content[0] = 'ایمیل';
      $content[1] = 'بازیابی';
      $content[2] = 'موفق';
      $content[3] = 'ما ایمیلی حاوی لینک بازیابی کلمه عبور برای شما شما ارسال کردیم';
      $content[4] = 'خطا';
      $content[5] = "لینک بازیابی نامعتبر است";
  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
      $content[0] = 'ایمیل';
      $content[1] = 'استعادة';
      $content[2] = 'ناجح';
      $content[3] = "لقد أرسلنا إليك بريدًا إلكترونيًا يحتوي على رابط استعادة كلمة المرور";
      $content[4] = "خطأ";
      $content[5] = "ارتباط الاسترداد غير صالح";
    }
  else {
      $content[0] = 'Email';
      $content[1] = 'Reset Password';
      $content[2] = 'Success';
      $content[3] = "We have sent you an email containing a password recovery link.";
      $content[4] = "error";
      $content[5] = "The reset password link is invalid";
  }
@endphp
<div id="content">
   <div id="reset-box">
    @if(isset($error))
          <div id="error">
              <p style="text-align: center;color:red;font-weight: 500;font-size:25px">{{$content[4]}}</p>
              <p style="text-align: center">{{$content[5]}}</p>
          </div>
    @endif
      @if(isset($success))
          <div id="success">
              <p style="text-align: center;color:green;font-weight: 500;font-size:25px">{{$content[2]}}</p>
              <p style="text-align: center">{{$content[3]}}</p>
          </div>
      @else
         <form id="reset-form" action="{{url('reset-password-token'.$langUrl)}}" method="POST">
         @csrf
          @if($errors->has('email'))
                <label for="email" style="color: red;padding: 8px">{{$errors->first('email')}}</label>
          @endif
         <input placeholder="{{$content[0]}}"  class="form-control" name="email" id="email" value="{{old('email')}}" type="text">
         <button id="reset-button">{{$content[1]}}</button>
       </form>
      @endif

   </div>
   </div>
@endSection

@section('css')
  <style>
     #reset-box{
        display: flex;
        flex-direction: column;
        width: 100%;
        padding: 100px 0;
     }

     #reset-form{
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
     }

     #reset-button{
        font-family: IranSans;
    flex: 1;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #002677;
    transition: all 0.5s;
    font-size: 14px;
    margin: 10px;
    padding: 8px 15px;
    cursor: pointer;
}

#reset-button:hover{
    background-color: #00a9e0;
}

#email{
   width: 90%;
   max-width: 400px;
   margin-bottom: 20px;
   outline: none;
   border: none;
   font-size: 16px;
   padding: 5px;
   border-bottom: 2px #ccc solid;
   font-family: IranSans;
}
  </style>
@endSection
