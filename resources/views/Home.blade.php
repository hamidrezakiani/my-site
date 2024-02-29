@extends('master')
@php
     $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
  {
    $langFlag = 'fa';
     $lang = '_fa';
     $langUrl = '?ln=fa';
      $content[0] = 'مشاوره آموزشی';
      $content[1] = 'دریافت وقت مشاوره';
      $content[2] = 'اطلاعات بیشتر';

  }
  elseif (isset($_GET['ln']) && $_GET['ln'] == 'ar') {
    $langFlag = 'ar';
     $lang = '_ar';
     $langUrl = '?ln=ar';
      $content[0] = 'بيئة';
      $content[1] = 'اقرأ أكثر';
      $content[2] = 'معلومات اكثر';
  }
  else {
    $lang = '';
     $langFlag = 'en';
     $langUrl = '';
      $content[0] = 'The Environment';
      $content[1] = 'reed more';
      $content[2] = 'reed more';
  }
@endphp
@section('css')

  <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/news-slider.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/slide-show.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/home.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/products.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/'.$langFlag.'/owghat.css')}}">
@endSection
@section('content')
 <div id="content">
  {{-- <div>
    <form autocomplete="off" action="/action_page.php">
      <div class="autocomplete" style="width:300px;">
        <input id="myInput" type="text" name="myCountry" placeholder="Country">
      </div>
      <input type="submit">
    </form>
  </div> --}}
        <div id="banner-box">
           <div class="image-slideshow-container">
@php $i=0; @endphp
@foreach ($sliders as $slider)
    <div class="image-Slides fade">
  <div class="slide-numbertext">{{++$i}} / {{sizeOf($sliders)}}</div>
  <img src="{{asset($slider->url)}}" style="width:100%">
  <div class="slide-text">{{$slider['title'.$lang]}}</div>
</div>
@endforeach




</div>
<br>

<div style="text-align:center">
@for ($j = 0; $j < $i; $j++)
   <span class="slide-dot"></span>
@endfor

</div>
          {{-- <div class="ds-banner">
            <!-- <div class="ds-banner__content">
              <h1 class="ds-banner__content__title">Life's at a tipping point</h1>
              <h2 class="ds-banner__content__subtitle">Welcome to our reinvention of essentials for sustainable&nbsp;living.</h2>
              <p class="ds-banner__content__text">
              <p>At Mppc, we’re putting our innovative plastic and base chemical solutions to work, to create progress for our
                customers and to bring a circular and carbon neutral future closer for us all.</p>
              <p></p>
              <div class="ds-button-group">
                <a href="https://www.Mppcgroup.com/polyolefins" target="_self" class="ds-button"
                  data-tracking="[{ &quot;category&quot;: &quot;Internal links&quot;, &quot;action&quot;: &quot;Explore our industries - Click&quot;, &quot;label&quot;: &quot;path&quot; }]">Explore
                  our industries</a>
                <a href="https://www.Mppcgroup.com/about-us" target="_self" class="ds-button ds-button--outlined"
                  data-tracking="[{ &quot;category&quot;: &quot;Internal links&quot;, &quot;action&quot;: &quot;Discover Mppc - Click&quot;, &quot;label&quot;: &quot;path&quot; }]">Discover
                  Mppc</a>
              </div>
            </div> -->
            <div class="ds-banner__video-wrapper">
              <video autoplay="" muted="" playsinline="" loop="" id="borealis backdrop" class="ds-banner__video">
                <source src="https://www.borealisgroup.com/storage/Borealis_Hub_Video_2.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
              </video>
            </div>


          </div> --}}
        </div>
        <div id="page-description">
               <h1>{!!$homeData['homeHeaderText']['value'.$lang]!!}</h1>
               <p>{!!$homeData['homeDescriptionText']['value'.$lang]!!}</p>
        </div>
        <div id="products-section">
        @foreach ($products as $product)
            <div class="product">
            <img class="product-image" src="{{asset($product->image)}}" alt="">
            <h2 class="product-title">{{$product['title'.$lang]}}</h2>
            <a class="product-link" href="{{url('products/'.$product->id.$langUrl)}}">{{$content[2]}}</a>
        </div>
         @endforeach
        </div>
        {{-- <div id="products">
          <a href="" class="product-box">
            <i class="fa fa-columns" style="font-size: 60px;color: #002677;"></i>
            <span>Energy</span>
          </a>
          <a href="" class="product-box">
            <i class="fa fa-columns" style="font-size: 60px;color: #002677;"></i>
            <span>Customer Products</span>
          </a>
          <a href="" class="product-box">
            <i class="fa fa-columns" style="font-size: 60px;color: #002677;"></i>
            <span>Automotive</span>
          </a>
          <a href="" class="product-box">
            <i class="fa fa-columns" style="font-size: 60px;color: #002677;"></i>
            <span>Healthcare</span>
          </a>
          <a href="" class="product-box">
            <i class="fa fa-columns" style="font-size: 60px;color: #002677;"></i>
            <span>Pipes & Fittings</span>
          </a>
          <a href="" class="product-box">
            <i class="fa fa-columns" style="font-size: 60px;color: #002677;"></i>
            <span>Solution for Polymers</span>
          </a>
          <a href="" class="product-box">
            <i class="fa fa-columns" style="font-size: 60px;color: #002677;"></i>
            <span>Base Chemicals</span>
          </a>
          <a href="" class="product-box">
            <i class="fa fa-columns" style="font-size: 60px;color: #002677;"></i>
            <span>Fertilizers</span>
          </a>
        </div> --}}
        <div id="section-3">
            <div id="section-3-image">
               <img id="section-3-small-image" src="{{asset($homeData['homeEnvironmentImageSmall']->value)}}" width="100%" alt="">
              <img id="section-3-large-image" src="{{asset($homeData['homeEnvironmentImageLarge']->value)}}" width="100%" alt="">
            </div>
            <div id="section-3-content">
               <h1>{{$content[0]}}</h1>
               <p>{!!$homeData['homeEnvironmentText']['value'.$lang]!!}</p>

              <a href="{{url('environment'.$langUrl)}}">{{$content[1]}}</a>
            </div>
        </div>
        {{-- <div id="section-4">
            <img src="./dist/images/petro4.jpg" alt="">
            <h3>Mppc has published its Combined Annual Report 2021</h3>
            <p>Combined non-financial and financial report published in English and German language.</p>
            <a href="">Read more about our Annual Report 2021</a>
        </div> --}}
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
                    <li>{{verta($news->created_at->toDateString())->format('Y-m-d')}}</li>
                 @else
                     <li>{{$news->created_at->toDateString()}}</li>
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

@section('js')
 <script src="{{asset('dist/js/'.$langFlag.'/owghat.js')}}"></script>
 <script src="{{asset('dist/js/news-slider.js')}}"></script>
 <script src="{{asset('dist/js/slide-show.js')}}"></script>
@endSection


