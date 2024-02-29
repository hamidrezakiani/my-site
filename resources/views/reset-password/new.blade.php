@extends('master')

@section('content')

@php
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
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
      $content[0] = 'کلمه عبور جدید';
      $content[1] = 'تکرار کلمه عبور';
      $content[2] = 'بازیابی';
      $content[3] = 'موفق';
      $content[4] = 'کلمه عبور با موفقیت تغییر کرد';
  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
      $content[0] = 'الرقم السر الجديدة';
      $content[1] = 'اعد الرقم السر';
      $content[2] = 'استعادة';
      $content[3] = 'ناجح';
      $content[4] = "تم تغيير الرقم السري بنجاح";
  }
  else {
      $content[0] = 'New password';
      $content[1] = 'Repeat password';
      $content[2] = 'Reset Password';
      $content[3] = 'Success';
      $content[4] = "Password changed successfully";
  }
@endphp
<div id="content">
   <div id="reset-box">
      @if(isset($success))
          <div id="success">
              <p style="text-align: center;color:green;font-weight: 500;font-size:25px">{{$content[3]}}</p>
              <p style="text-align: center">{{$content[4]}}</p>
          </div>
      @else
         <form id="reset-form" action="{{url('new-password'.$langUrl)}}" method="POST">
         @csrf
         <input type="hidden" name="token" value="{{$token}}">
          @if($errors->has('password'))
                <label for="password" style="color: red;padding: 8px">{{$errors->first('password')}}</label>
          @endif
         <input placeholder="{{$content[0]}}"  class="form-control" name="password" id="password" value="{{old('password')}}" type="password">
         <br>
         <input placeholder="{{$content[1]}}"  class="form-control" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" type="password">
         <button id="reset-button">{{$content[2]}}</button>
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

#password,#password_confirmation{
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
