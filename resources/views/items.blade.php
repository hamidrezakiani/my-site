@extends('master')




@section('content')
@php

     $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa'||true)
  {
    $langFlag = 'fa';
     $lang = '_fa';
     $langUrl = '?ln=fa';
      $content[0] = 'محصولات و تکنولوژی';
      $content[1] = 'کتابچه الکترونیکی محصولات';
      $content[2] = 'ادامه مطلب';

  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
    $langFlag = 'ar';
     $lang = '_ar';
     $langUrl = '?ln=ar';
      $content[0] = 'محصولات و تکنولوژی';
      $content[1] = 'کتابچه الکترونیکی محصولات';
      $content[2] = 'ادامه مطلب';
  }
  else {
    $lang = '';
     $langFlag = 'en';
     $langUrl = '';
      $content[0] = 'Products and Technology';
      $content[1] = 'E-book Products';
      $content[2] = 'Read more';
  }
@endphp
  <div id="content">
    <div id="title">
        @if($langFlag == 'fa')
         <h1>{{$item->name_fa}} دانلود های</h1>
       @elseif($langFlag == 'ar')
          <h1>{{$item->name_ar}} دانلود های</h1>
       @else
         <h1>{{$item->name}} Donwloads</h1>
       @endif
     </div>
     <div id="item-section">
       <a href="{{url($item->pdf)}}"><i class="fa fa-download" style="color:#fff;margin-right:10px;"></i>{{$item['name'.$lang]}}</a>
     </div>
     <div id="catalog-section">
        @foreach ($item->catalogs as $catalog)
           <a class="catalog" href="{{url($catalog->pdf)}}"><i class="fa fa-download" style="margin-right: 10px"></i>{{$catalog['name'.$lang]}}</a>
        @endforeach
     </div>
  </div>
@endSection

@section('css')
   <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/items.css')}}">
@endSection
