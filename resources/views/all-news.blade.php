@extends('master')

@section('content')

@php

     $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa'||true)
  {
    $langFlag = 'fa';
     $lang = '_fa';
     $langUrl = '?ln=fa';
      $content[0] = 'اخبار شرکت پویا پلیمری مارون';
      $content[1] = 'ادامه مطلب';

  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
    $langFlag = 'ar';
     $lang = '_ar';
     $langUrl = '?ln=ar';
      $content[0] = 'أخبار شركة بويا بوليميري مارون';
      $content[1] = 'اقرأ أكثر';
  }
  else {
    $lang = '';
     $langFlag = 'en';
     $langUrl = '';
      $content[0] = 'mppc news';
      $content[1] = 'Read more';
  }
@endphp
 <div id="content">
    {{-- <div id="page-title">
     <h1>{{$content[0]}}</h1>
    </div> --}}
  <div id="all-news">
    @foreach ($all_news as $news)
        <div class="news-box">
        <div class="news">
          <div class="news-header">
            @if($langFlag == 'fa')
               <span id="news-date">{{verta($news->created_at->toDateString())->format('Y-m-d')}}</span>
            @else
               <span id="news-date">{{$news->created_at->toDateString()}}</span>
            @endif
          </div>
          <div class="news-body">
            <img src="{{asset($news->image)}}" alt="">
            <h3>{{$news['title'.$lang]}}</h3>
          </div>
          <div class="news-footer">
              <a href="{{url('news/'.$news->id.$langUrl)}}">{{$content[1]}}</a>
          </div>
        </div>
     </div>
    @endforeach

  </div>
 </div>
@endSection

@section('css')
 <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/all-news.css')}}">
@endSection
