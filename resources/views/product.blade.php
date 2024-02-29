@extends('master')




@section('content')
@php

     $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
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
       <h1>{{$product['title'.$lang]}}</h1>
     </div>
     <div id="product">
       <img id="product-image" src="{{asset($product->image)}}" alt="">
       <div id="product-content">
         <div id="product-text">{!!$product['text'.$lang]!!}</div>
         <div id="product-items">
            @foreach ($product->items as $item)
                <a class="product-item" href="{{url('items/'.$item->id.$langUrl)}}">{{$item['name'.$lang]}}</a>
            @endforeach
         </div>
       </div>
     </div>
  </div>
@endSection
@section('css')
   <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/product.css')}}">
@endSection
