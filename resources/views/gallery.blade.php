@extends('master')

@section('content')

@php
if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
     {
        $content = [];
        $content[0] = 'گالری تصایر شرکت پویا پلیمری مارون';
     $langFlag = 'fa';
     $lang = '_fa';
     }
   elseif(isset($_GET['ln']) && $_GET['ln'] == 'ar')
     {
     $langFlag = 'ar';
     $lang = '_ar';
     $content = [];
        $content[0] = 'معرض صور شركة مارون بويا بوليمر';
     }
   else
     {
        $lang = '';
     $langFlag = 'en';
     $content = [];
        $content[0] = 'MPPC Gallery';
    }
@endphp
  <div id="content">
    <div id="image-show">
       <div id="image-content">
          <img id="image" src="" alt="">
          <div class="close-image"><span style="font-size:30px;color:#fff" class="fa fa-close"></span></div>
       </div>
       <div id="backdoor">
       </div>
    </div>
     <div id="title">
       <h1>{{$content[0]}}</h1>
     </div>
     <div id="gallery">
        @foreach ($images as $image)
            <div class="image-div">
               <div class="image-title">
                  <h6>{{$image['title'.$lang]}}</h6>
               </div>
               <div class="image-box">
                   <img class="image" src="{{asset($image->url)}}" alt="{{$image->title}}">
               </div>
            </div>
        @endforeach
     </div>

  </div>
@endSection

@section('css')
  <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/gallery.css')}}">
@endSection

@section('js')
  <script>
    $('.image').on('click',function(){
        var imageSuorce = $(this).attr('src');
        $('#image').attr('src',imageSuorce);
        document.getElementById('image-show').classList.add('show-image');
    });

    $('#backdoor').on('click',function(){
        document.getElementById('image-show').classList.remove('show-image');
    })

    $('.close-image').on('click',function(){
        document.getElementById('image-show').classList.remove('show-image');
    })
  </script>
@endSection

