@extends('master')
@section('css')
  <link rel="stylesheet" href="{{asset('dist/css/'.($_GET['ln'] ?? 'en').'/about-us.css')}}">
@endSection
@php
  $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa'||true)
  {
      $langFlag = '_fa';
      $content[0] = 'درباره ما';
      $content[1] = 'شعار شرکت اینجا می رود';
      $content[2] = 'مهارت و تخصص ما';
      $content[3] = 'تیم ما';
      $content[4] = 'فلسفه';
      $content[5] = 'چرا ما؟';
      $content[6] = 'تاریخچه';

  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
   $langFlag = '_ar';
      $content[0] = 'معلومات عنا';
      $content[1] = 'شعار الشركة يذهب هنا';
      $content[2] = 'مهاراتنا وخبراتنا';
      $content[3] = 'فريقنا';
      $content[4] = 'فلسفة';
      $content[5] = 'لماذا نحن؟';
      $content[6] = 'تاريخ';
   }
  else {
      $langFlag = '';
      $content[0] = 'About Us';
      $content[1] = 'Company Slogan Goes Here';
      $content[2] = 'Our Skills & Expertise';
      $content[3] = 'Our Team';
      $content[4] = 'Philosophy';
      $content[5] = 'Why Us?';
      $content[6] = 'History';

  }
@endphp
@section('content')

   <div id="content">
         <div class="about-box">
            <h2 class="about-header">{{$content[0]}}</h2>
            <div class="about-body">
              <p class="about-content">
                    {{$aboutContents['aboutText']['value'.$langFlag]}}
              </p>
              <img class="about-image" src="{{asset($aboutContents['aboutImage']->value)}}" alt="">
            </div>
         </div>
     {{-- <div id="section-2">
        <h1>{{$content[1]}}</h1>
        <h2>{{$aboutContents['sloganText']['value'.$langFlag]}}</h2>
     </div> --}}
     {{-- <div id="section-3">
         @foreach ($slogans as $slogan)
             <div class="section-3">
           <img src="{{asset($slogan->image)}}" alt="cropped-MPPCc-square.jpg" />
           <h4>{{$slogan['title'.$langFlag]}}</h4>
           <span>{{$slogan['text'.$langFlag]}}</span>
         </div>
         @endforeach
     </div> --}}
     {{-- <div id="section-4">
        <div id="section-4-text">
          <h1>{{$content[2]}}</h1>
          <p>{{$aboutContents['skillText']['value'.$langFlag]}}</p>
        </div>
        <div id="section-4-chart">
            @foreach ($skills as $skill)
              <div class="chart-item">
                <span>{{$skill['title'.$langFlag]}}</span>
                <div class="progress">
                    <span style="width: {{$skill->value}}%">{{$skill->value}}%</span>
                </div>
            </div>
            @endforeach
        </div>
     </div> --}}
     <div id="section-5">
           <div id="section-5-title">
             <h1>{{$content[3]}}</h1>
           </div>
           <div id="section-5-items">
              @foreach ($team as $person)
                  <div class="section-5-item">
                 <img src="{{asset($person->image)}}" alt="cropped-MPPCc-square.jpg">
                 <h1>{{$person['name'.$langFlag]}}</h1>
                 <p>{{$person['description'.$langFlag]}}</p>
              </div>
              @endforeach
           </div>

     </div>

         {{-- <div id="section-6">
            <div class="section-6-item">
               <h1>{{$content[4]}}</h1>
               <p>{{$aboutContents['philosophy']['value'.$langFlag]}}</p>
            </div>
            <div class="section-6-item">
               <h1>{{$content[5]}}</h1>
               <p>{{$aboutContents['whyUs']['value'.$langFlag]}}</p>
            </div>
         </div> --}}

        {{-- <div id="section-7">
            <h1>{{$content[6]}}</h1>
           @foreach ($histories as $history)
               <div class="history">
               <h3>{{$history['year'.$langFlag]}}</h3>
               <p>{{$history['text'.$langFlag]}}</p>
           </div>
           @endforeach
        </div> --}}
   </div>
@endSection
