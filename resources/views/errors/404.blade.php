@extends('master')
@php
if(isset($_GET['ln']) && $_GET['ln'] == 'fa'||true)
     {
        $content = [];
        $content[0] = '!!!متاسفیم';
        $content[1] = '.صفحه مورد نظر یافت نشد';
     }
   elseif(isset($_GET['ln']) && $_GET['ln'] == 'ar')
     {
     $langFlag = 'ar';
     $content = [];
      $content[0] = '!!!آسف';
        $content[1] = '.الصفحة غير موجودة';
     }
   else
     {
     $langFlag = 'en';
     $content = [];
        $content[0] = 'Sorry!!!';
        $content[1] = 'The page not found.';
    }
@endphp
@section('content')
  <div id="content">
    <div class="row" style="margin-bottom: 50px">
        <h1 style="font-size:200px;text-align: center;color: #002677;padding: 0px;margin: 0px;line-height: 250px">404</h1>
        <h1 style="text-align: center;font-family: IranSans;color: #002677;font-size: 30px;margin-top:0px;padding-top: 0">{{$content[0]}}</h1>
        <h2 style="text-align: center;font-family: IranSans;color: #002677">{{$content[1]}}</h2>
    </div>
  </div>
@endSection

@section('css')
    <style>
         @font-face {
    font-family: IranSans;
    src: '../../font/iransans/IRANSansWeb.ttf';
}
    </style>
@endSection



