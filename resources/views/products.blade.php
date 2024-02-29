@extends('master')




@section('content')
@php

     $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
  {
    $langFlag = 'fa';
     $lang = '_fa';
     $langUrl = '?ln=fa';
      $content[0] = 'محصولات ';
      $content[1] = 'کتابچه الکترونیکی محصولات';
      $content[2] = 'اطلاعات بیشتر';

  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
    $langFlag = 'ar';
     $lang = '_ar';
     $langUrl = '?ln=ar';
      $content[0] = 'المنتجات والتكنولوجيا';
      $content[1] = 'منتجات الكتاب الإلكتروني';
      $content[2] = 'معلومات اكثر';
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
       <h1>{{$content[0]}}</h1>
     </div>
     {{-- <div id="download-book">
        <a href="{{url('dist/book/Marun-pouya-polymer-compound-co-ebook.pdf')}}"><i class="fa fa-download" style="color: #fff;margin:0 5px"></i>{{$content[1]}}</a>
     </div> --}}
     <div id="products-section">
        @foreach ($products as $product)
            <div class="product">
            <img class="product-image" src="{{asset($product->image)}}" alt="">
            <h2 class="product-title">{{$product['title'.$lang]}}</h2>
            <a class="product-link" href="{{url('products/'.$product->id.$langUrl)}}">{{$content[2]}}</a>
        </div>
        @endforeach
     </div>
  </div>
@endSection

@section('css')
   <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/products.css')}}">
@endSection
