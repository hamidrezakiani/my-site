@extends('master')

@section('content')

@php
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa'||true)
     {
     $langFlag = 'fa';
     $dir='rtl';
     $flex="row-reverse";
     $lang = '_fa';
     $successMessage = 'پیام شما با موفقیت ارسال شد';
     }
   elseif(isset($_GET['ln']) && $_GET['ln'] == 'ar')
     {
     $langFlag = 'ar';
     $dir='rtl';
     $flex="row-reverse";
     $lang = '_ar';
     $successMessage = 'پیام شما با موفقیت ارسال شد';
     }
   else
     {
        $lang = '';
        $dir='ltr';
        $flex="row";
     $langFlag = 'en';
     $successMessage = 'Your message has been successfully sent';
    }

     $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
  {
      $content[0] = 'آدرس';
      $content[1] = 'ایمیل';
      $content[2] = 'تلفن';
      $content[3] = 'فروش';
      $content[4] = 'پشتیبانی';
      $content[5] = 'ساعات';
      $content[6] = 'نام';
      $content[7] = 'موضوع';
      $content[8] = 'ایمیل';
      $content[9] = 'پیام شما';
      $content[10] = 'ارسال پیام';

  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
      $content[0] = 'عنوان';
      $content[1] = 'بريد إلكتروني';
      $content[2] = 'هاتف';
      $content[3] = 'المبيعات';
      $content[4] = 'دعم عبر';
      $content[5] = 'ساعات';
      $content[6] = 'الاسم';
      $content[7] = 'العنوان';
      $content[8] = 'بريد إلكتروني';
      $content[9] = 'رسالتك';
      $content[10] = 'إرسال رسالة';
  }
  else {
      $content[0] = 'Address';
      $content[1] = 'E-Mail';
      $content[2] = 'Phone';
      $content[3] = 'Sales';
      $content[4] = 'Support';
      $content[5] = 'Hours';
      $content[6] = 'Your name';
      $content[7] = 'Subject';
      $content[8] = 'Your email';
      $content[9] = 'Your message';
      $content[10] = 'Send Message';

  }
@endphp
<div id="content">
    <div id="section-boxes">
     <div class="contact-item">
        <i style="color: #002677;font-size:50px" class="fa fa-home"></i>
        <h2>{{$content[0]}}</h2>
        <span>
            <strong>{{$contactSettings['address']['value'.$lang]}}</strong>
        </span>
     </div>
     <div class="contact-item">
        <i  style="color: #002677;font-size:50px"class="fa fa-envelope"></i>
        <h2>{{$content[1]}}</h2>
        <span><strong>{{$contactSettings['email']['value']}}</strong></span>
     </div>
     <div class="contact-item">
        <i style="color: #002677;font-size:50px" class="fa fa-phone"></i>
        <h2>{{$content[2]}}</h2>
        <span>
            <div style="display:flex;flex-direction:{{$flex}}">
                  <strong dir="{{$dir}}" style="margin:0 10px">{{$content[3]}} :</strong>
                  <strong  style="direction: ltr !important;text-align: left">{{$contactSettings['phone_sales']['value'.$lang]}}</strong>
            </div>
        </span>
        <span>
         <div style="display:flex;flex-direction:{{$flex}}">
               <strong dir="{{$dir}}" style="margin:0 10px">{{$content[4]}} : </strong>
               <strong  style="direction: ltr !important;text-align: left">{{$contactSettings['phone_support']['value'.$lang]}}</strong>  
         </div>
         
        </span>
     </div>
     <div class="contact-item">
        <i style="color: #002677;font-size:50px" class="fa fa-clock"></i>
        <h2>{{$content[5]}}</h2>
        <span><strong>{{$contactSettings['days']['value'.$lang]}}</strong></span>
        <span><strong dir="{{$dir}}" >{{$contactSettings['hours']['value'.$lang]}}</strong></span>
     </div>
   </div>
   <div id="contact-us">
      @if(session('contact'))
       <span class="success-text">{{$successMessage}}</span>
      @endif
      <form action="{{url('contact-us')}}" method="POST">
         @csrf
         <input type="hidden" name="ln" value="{{$langFlag}}">
         @if($errors->has('name'))
                <label for="" dir="{{$dir}}" class="error-text">{{$errors->first('name')}}</label>
          @endif
         <input @if(Auth::check()) type="hidden" value="{{Auth::user()->name}}" @else value="{{old('name')}}" type="text" @endif placeholder="{{$content[6]}}" class="contact-input" name="name">
         @if($errors->has('subject'))
                <label for="" dir="{{$dir}}" class="error-text">{{$errors->first('subject')}}</label>
         @endif
         <input placeholder="{{$content[7]}}" value="{{old('subject')}}" class="contact-input" name="subject"  type="text">
         @if($errors->has('email'))
                <label for="" dir="{{$dir}}" class="error-text">{{$errors->first('email')}}</label>
          @endif
         <input placeholder="{{$content[8]}}"  class="contact-input" name="email" @if(Auth::check()) type="hidden" value="{{Auth::user()->email}}" @else value="{{old('email')}}" type="text" @endif>
         @if($errors->has('message'))
                <label for="" dir="{{$dir}}" class="error-text">{{$errors->first('message')}}</label>
          @endif
         <textarea name="message" class="contact-input" id="contact-message" rows="10" placeholder="{{$content[9]}}">{{old('message')}}</textarea>
         <button id="send-message-btn">{{$content[10]}}</button>
       </form>
   </div>
   </div>
@endSection

@section('css')
  <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/contact-us.css')}}">
@endSection
