@extends('master')
@section('css')
  <link rel="stylesheet" href="{{asset('dist/css/'.($_GET['ln'] ?? 'en').'/environment.css')}}">
@endSection
@php
  $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa'){
      $langFlag = '_fa';
  }
  elseif(isset($_GET['ln']) && $_GET['ln'] == 'ar'){
      $langFlag = '_ar';
  }
  else{
      $langFlag = '';
  }
@endphp
@section('content')

   <div id="content">
         <div class="about-box">
            <h2 class="about-header">{{$environmentData['title']['value'.$langFlag]}}</h2>
            <div class="about-body">
              <div id="about-content">
                <p class="about-content">
                    {!!$environmentData['text']['value'.$langFlag]!!}
              </p>
              </div>
              <div class="images">
                {{-- @foreach ($environmentData['image'] as $image) --}}
                  <img class="about-image" src="{{asset($environmentData['image'][0]->value)}}" alt="">
                {{-- @endforeach --}}
              </div>
            </div>
         </div>
   </div>
@endSection
