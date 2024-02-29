@extends('master')

@section('content')
@php

     $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
  {
    $langFlag = 'fa';
     $lang = '_fa';
     $langUrl = '?ln=fa';
     $content[0] = 'مطالب آموزشی اخیر';

  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
    $langFlag = 'ar';
     $lang = '_ar';
     $langUrl = '?ln=ar';
      $content[0] = 'آخر أخبار شركة بويا بوليميري مارون';
  }
  else {
    $lang = '';
     $langFlag = 'en';
     $langUrl = '';
      $content[0] = 'Latest mppc news';
  }
@endphp
<div id="content">
   <div id="news-box">
    @if($langFlag == 'fa')
        <span id="news-date">{{verta($news->created_at->toDateString())->format('Y-m-d')}}</span>
    @else
       <span id="news-date">{{$news->created_at->toDateString()}}</span>
    @endif

     <img id="news-image" src="{{asset($news->image)}}" alt="">
     <h2 id="news-title">{{$news['title'.$lang]}}</h2>
     <div id="news-content">{!!$news['text'.$lang]!!}</div>
    </div>
   <span id="last-news-text">
     {{$content[0]}}
   </span>
   <div id="section-news">
        <div id="news-container">
           @foreach ($last_news as $news)
               <a class="news" href="{{url('news/'.$news->id.$langUrl)}}">
            <div class="news-item">
              <div class="news-date">
                 @if($langFlag == 'fa')
                    <li>{{verta($news->created_at->toDateString())->format('Y-m-d')}}</li>
                 @else
                     <li>{{$news->created_at->toDateString()}}</li>
                 @endif
              </div>
              <div class="news-content">
                  <img class="news-image" src="{{asset($news->image)}}" alt="">
                 <h1 class="news-title">
                    {{$news['title'.$lang]}}
                 </h1>
              </div>
             </div>
           </a>
           @endforeach
        </div>
        <div id="news-slider">
            <div class="slideshow-container">
               @foreach ($last_news as $news)
                   <a href="{{url('news/'.$news->id.$langUrl)}}">
    <div class="mySlides fade">
  <div class="numbertext">
    @if($langFlag == 'fa')
      {{verta($news->created_at->toDateString())->format('Y-m-d')}}
    @else
      {{$news->created_at->toDateString()}}
    @endif
  </div>
  <img src="{{asset($news->image)}}" style="width:100%">
  <div class="slider-news-content">{{$news['title'.$lang]}}</div>
</div>
</a>
               @endforeach



<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  @for ($i = 1; $i <= sizeOf($last_news); $i++)
    <span class="dot" onclick="currentSlide({{$i}})"></span>
  @endfor
</div>
</div>
        </div>
</div>
@endSection

@section('css')
<link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/news-slider.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/home.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/news.css')}}">
@endSection

@section('js')
 <script src="{{asset('dist/js/news-slider.js')}}"></script>
@endSection
