@php
$arabicIsEnable = App\Models\Control::where('key','ARABIC')->first()->enable;
  if(!$arabicIsEnable && isset($_GET['ln']) && $_GET['ln'] == 'ar')
    return false;
  $content = [];
  if(isset($_GET['ln']) && $_GET['ln'] == 'fa'||true)
  {
      $langFlag = '_fa';
      $lang = 'fa';
      $lnUrl = '?ln=fa';
      $content[0] = 'محصولات';
      $content[1] = 'تماس با ما';
      $content[2] = 'مناقصه ها و مزایده ها';
      $content[3] = 'مطالب آموزشی';
      // $content[4] = 'گالری';
      $content[5] = 'مشاوره';
      $content[6] = 'درباره ما';
      $content[7] = 'ورود';
      $content[8] = 'اطلاعات بیشتر';
      $content[9] = 'آدرس';
      $content[10] = 'بخش های سایت';
      $content[11] = 'جستجو';
      $content[12] = 'جستجو';
      $content[13] = 'ورود';
      $content[14] = 'ثبت نام';
      $content[15] = 'ایمیل';
      $content[16] = 'رمز عبور';
      $content[17] = 'ورود';
      $content[18] = 'انصراف';
      $content[19] = "نام";
      $content[20] = "تکرار رمز عبور";
      $content[21] = "ثبت نام";
      $content[22] = "خانه";
      $content[23] = "پنل کاربری";
      $content[24] = "ادمین پنل";
      $content[25] = "رمز عبور خود را فراموش کرده اید؟";
      $content[26] = "سرویس ایمیل سازمانی";
      $content[27] = "سیستم حضور غیاب";

  }
  elseif(isset($_GET['ln']) && $_GET['ln'] == 'ar') {
     $langFlag = '_ar';
     $lang = 'ar';
     $lnUrl = '?ln=ar';
      $content[0] = 'منتجات';
      $content[1] = 'اتصل بنا';
      $content[2] = 'المناقصات والمزايدات';
      $content[3] = 'الأخبار و الأحداث';
      $content[4] = 'صالة عرض';
      $content[5] = 'البيئة';
      $content[6] = 'معلومات عنا';
      $content[7] = 'الدخول';
      $content[8] = 'معلومات اكثر';
      $content[9] = 'عنوان';
      $content[10] = 'أقسام الموقع';
      $content[11] = "يبحث";
      $content[12] = "يبحث";
      $content[13] = "الدخول";
      $content[14] = "يسجل";
      $content[15] = "أدخل بريدك الإلكتروني ...";
      $content[16] = "ادخل رقمك السري...";
      $content[17] = "تسجيل الدخول";
      $content[18] = "يلغي";
      $content[19] = "أدخل أسمك...";
      $content[20] = "أكد رقمك السري...";
      $content[21] = "يسجل";
      $content[22] = "الصفحة الرئيسية";
      $content[23] = "حساب";
      $content[24] = "ادمین پنل";
      $content[25] = "نسيت كلمة السر؟";
      $content[26] = "خدمة البريد الإلكتروني للمؤسسات";
      $content[27] = "نظام الحضور";
  }else{
      $langFlag = '';
      $lang = 'en';
      $lnUrl = '';
      $content[0] = 'Products';
      $content[1] = 'Contact Us';
      $content[2] = 'Tenders & Auctions';
      $content[3] = 'News & Events';
      $content[4] = 'Gallery';
      $content[5] = 'The Environment';
      $content[6] = 'About Us';
      $content[7] = 'Sign In';
      $content[8] = 'MORE INFORMATION';
      $content[9] = 'ADDRESS';
      $content[10] = 'SITE SECTIONS';
      $content[11] = "Search";
      $content[12] = "SEARCH";
      $content[13] = "LOGIN";
      $content[14] = "REGISTER";
      $content[15] = "Enter Your Email...";
      $content[16] = "Enter Your Password...";
      $content[17] = "Login";
      $content[18] = "Cancel";
      $content[19] = "Enter Your Name...";
      $content[20] = "Confirm Your Password...";
      $content[21] = "Register";
      $content[22] = "Home";
      $content[23] = "account";
      $content[24] = "Admin Panel";
      $content[25] = "Forgot your password?";
      $content[26] = "web mail";
      $content[27] = "webkart";

  }

@endphp
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
  <meta name="viewport" content="width=device-width, initial-scale=0">
  <title>Mppc</title>
  <link rel="stylesheet" href="{{asset('dist/css/'.$lang.'/header.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/'.$lang.'/footer.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/'.$lang.'/login-modal.css')}}">
  <link rel="stylesheet" href="{{asset('dist/fontawesome/all.css')}}">
  <link rel="icon" type="image/x-icon" href="{{asset('dist/images/logo/2222.jpg')}}">
  @yield('css')
  <script src="{{asset('dist/fontawesome/all.js')}}"></script>
</head>
<body>

   <!-- modal for login and register -->
    <div id="login-modal">
       <div id="login-modal-box">
          <div id="login-modal-header">
             <span id="login-tab-button" @if(!$errors->has('register'))class="active" @endif>{{$content[13]}}</span>
             <span id="register-tab-button" @if($errors->has('register'))class="active" @endif>{{$content[14]}}</span>
          </div>
          <form id="login-form" action="{{url('login')}}" method="POST">
            @csrf
            <input type="hidden" name="ln" value="{{$lang}}">
          <div id="login-modal-content" @if(!$errors->has('register')) class="active-tab" @endif>
            @if($errors->has('login') && $errors->has('email'))
                <label for="" class="error-text">{{$errors->first('email')}}</label>
             @endif
             <input type="text" name="email" class="login-email" value="{{old('email')}}" placeholder="{{$content[15]}}">

             @if($errors->has('login') && $errors->has('password'))
                <label for="" class="error-text">{{$errors->first('password')}}</label>
              @endif
             <input type="password" name="password" class="login-password" placeholder="{{$content[16]}}">
          </div>
          <div id="login-modal-footer" @if(!$errors->has('register'))class="active-tab" @endif>
              <a id="login-button">{{$content[17]}}</a>
              <span class="hide-login-modal">{{$content[18]}}</span>
          </div>
            <div id="reset-password-div" class="active-tab">
                <a href="{{url('reset-password-token')}}">{{$content[25]}}</a>
            </div>
          </form>
          <form id="register-form" method="POST" action="{{url('register')}}">
            @csrf
            <input type="hidden" name="ln" value="{{$lang}}">
            <div id="register-modal-content" @if($errors->has('register'))class="active-tab" @endif>
              @if($errors->has('register') && $errors->has('name'))
              <label for="" class="error-text">{{$errors->first('name')}}</label>
                @endif
             <input type="text" name="name" value="{{old('name')}}" class="login-email" placeholder="{{$content[19]}}">

                @if($errors->has('register') && $errors->has('email'))
                <label for="" class="error-text">{{$errors->first('email')}}</label>
                @endif
             <input type="text" value="{{old('email')}}" name="email" class="login-email" placeholder="{{$content[15]}}">
             @if($errors->has('register') && $errors->has('password'))
                <label for="" class="error-text">{{$errors->first('password')}}</label>
                @endif
             <input type="password" value="{{old('password')}}" name="password" class="login-password" placeholder="{{$content[16]}}">
             <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="login-password" placeholder="{{$content[20]}}">
          </div>
          <div id="register-modal-footer" @if($errors->has('register'))class="active-tab" @endif>
              <a id="register-button">{{$content[21]}}</a>
              <span class="hide-login-modal">{{$content[18]}}</span>
          </div>
          </form>
       </div>
       <div id="modal-backdoor">

        </div>
    </div>
   <!-- end modal -->
   <section class="header">
      <div id="header-box">
        <div id="top">
            <marquee 
             style="color:#fff"
             @if($langFlag == '') direction="left" @else direction="right" @endif>{{App\Models\Other::where('key','marquee')->first()['value'.$langFlag]}}</marquee>
            {{-- <a href="">textarea</a>
            <a href="">command</a>
            <a href="">internet</a>
            <a href="">popover</a>
            <a href="">colgroup</a>
            <a href="">basefont</a>
            <a href="">questions</a> --}}
        </div>
        <div id="bottom">
           <div id="logo">
            <a href="{{url($lnUrl)}}"><img id="logo-img" src="{{asset('dist/images/logo/logo.png')}}" height="80" width="113" alt=""></a>
          </div>
           <div id="menu">
             <a href="{{url('products'.$lnUrl)}}">{{$content[0]}}</a>
             <a href="{{url('contact-us'.$lnUrl)}}">{{$content[1]}}</a>
             {{-- <a href="{{url('auction'.$lnUrl)}}">{{$content[2]}}</a> --}}
             <a href="{{url('news'.$lnUrl)}}">{{$content[3]}}</a>
             {{-- <a href="{{url('gallery'.$lnUrl)}}">{{$content[4]}}</a> --}}
             <a href="{{url('environment'.$lnUrl)}}">{{$content[5]}}</a>
             <a href="{{url('about-us'.$lnUrl)}}">{{$content[6]}}</a>
             {{-- <div id="language">
               @if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
                <a class="selected"><i class="fa fa-angle-down" style="position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/farsi.png')}}" alt=""><span>فا</span></a>
               <a href="?ln=en" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/english.png')}}" alt=""><span>en</span></a>
                @if($arabicIsEnable)
               <a href="?ln=ar" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/arabic.png')}}" alt=""><span>ar</span></a>
                @endif
               @elseif($arabicIsEnable && isset($_GET['ln']) && $_GET['ln'] == 'ar')
                 <a class="selected"><i class="fa fa-angle-down" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/arabic.png')}}" alt=""><span>ar</span></a>
                 <a href="?ln=en" class="ln-hide language" ><i class="" style="position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/english.png')}}" alt=""><span>en</span></a>
                 <a href="?ln=fa" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/farsi.png')}}" alt=""><span>فا</span></a>
               @else
                 <a class="selected"><i class="fa fa-angle-down" style="position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/english.png')}}" alt=""><span>en</span></a>
                 <a href="?ln=fa" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/farsi.png')}}" alt=""><span>فا</span></a>
                 @if($arabicIsEnable)
                  <a href="?ln=ar" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/arabic.png')}}" alt=""><span>ar</span></a>
                 @endif
              @endif
             </div> --}}
           </div>
           <div id="header-buttons">
             <div id="search-icon"><i style="font-size: 16px;color: #fff;" class='fas fa-search'></i></div>
             <div id="login-box">@if(!Auth::check()) <span class="sign-in-button">{{$content[7]}}</span> @else
               @if(Auth::user()->role_id)
                   <a href="{{url('admin/dashboard')}}">{{$content[24]}}</span>
               @else
             <a href="{{url('panel'.$lnUrl)}}">{{$content[23]}}</span>
              @endif
             @endif</div>
           </div>
        </div>
      </div>
      <div id="mobile-header-box">
          <div id="toggle-menu"><i style="font-size: 15px;" class='fas fa-bars'></i></div>
          <div id="mobile-search-icon"><i style="font-size: 12px;" class='fas fa-search'></i></div>
          {{-- <div id="language">
               @if(isset($_GET['ln']) && $_GET['ln'] == 'fa')
                <a class="selected"><i class="fa fa-angle-down" style="font-size: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/farsi.png')}}" alt=""><span>فا</span></a>
               <a href="?ln=en" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/english.png')}}" alt=""><span>en</span></a>
                @if($arabicIsEnable)
               <a href="?ln=ar" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/arabic.png')}}" alt=""><span>ar</span></a>
                @endif
               @elseif($arabicIsEnable && isset($_GET['ln']) && $_GET['ln'] == 'ar')
                 <a class="selected"><i class="fa fa-angle-down" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/arabic.png')}}" alt=""><span>ar</span></a>
                 <a href="?ln=en" class="ln-hide language" ><i class="" style="font-size: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/english.png')}}" alt=""><span>en</span></a>
                 <a href="?ln=fa" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/farsi.png')}}" alt=""><span>فا</span></a>
               @else
                 <a class="selected"><i class="fa fa-angle-down" style="font-size: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/english.png')}}" alt=""><span>en</span></a>
                 <a href="?ln=fa" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/farsi.png')}}" alt=""><span>فا</span></a>
                 @if($arabicIsEnable)
                  <a href="?ln=ar" class="ln-hide language"><i class="" style="width: 25px;position: relative; ;left: 0;;"></i><img src="{{asset('dist/images/arabic.png')}}" alt=""><span>ar</span></a>
                 @endif
               @endif
             </div> --}}
          <div id="mobile-logo"><a href="{{url($lnUrl)}}">
            <img src="{{asset('dist/images/logo/2222.jpg')}}" width="30" height="44" alt="">
          </a></div>
      </div>
      <div id="search-box">
        <div id="ds-container">
          <form action="{{url('news/search')}}">
             <div id="ds-search">
                <span class='fas fa-search' id="search-box-icon"></span>
                <input type="hidden" name="ln" value="{{$_GET['ln'] ?? ''}}">
                <input placeholder="{{$content[11]}}" id="search-input" type="text" name="search">
                <span id="delete-search"><i class="fas fa-times"></i></span>
                <button style="border: none;outline: none" type="submit" id="search-button">{{$content[12]}}</button>
             </div>
          </form>
        </div>
      </div>
      <div id="shadow"></div>
      <div id="mobile-menu-box">
         <div id="menu-items">
           <div class="item">
             <a href="{{url($lnUrl)}}">{{$content[22]}}</a>
           </div>
           <div class="item">
             <a href="{{url('products'.$lnUrl)}}">{{$content[0]}}</a>
           </div>
          <div class="item">
            <a href="{{url('contact-us'.$lnUrl)}}">{{$content[1]}}</a>
          </div>
          {{-- <div class="item">
            <a href="">{{$content[2]}}</a>
          </div> --}}
          <div class="item">
            <a href="{{url('news'.$lnUrl)}}">{{$content[3]}}</a>
          </div>
          {{-- <div class="item">
            <a href="{{url('gallery'.$lnUrl)}}">{{$content[4]}}</a>
          </div> --}}
          <div class="item">
            <a href="">{{$content[5]}}</a>
          </div>
          <div class="item" style="border-bottom: none;">
            <a href="{{url('about-us'.$lnUrl)}}">{{$content[6]}}</a>
          </div>
         </div>
         <div id="menu-links">
            <div class="link-box">
              <a class="sign-in-button">{{$content[7]}}</a>
            </div>
            {{-- <div class="link-box">
              <a href="">Link 2</a>
            </div>
            <div class="link-box">
              <a href="">Link 3</a>
            </div>
            <div class="link-box">
              <a href="">Link 4</a>
            </div>
            <div class="link-box">
              <a href="">Link 5</a>
            </div>
            <div class="link-box">
              <a href="">Link 6</a>
            </div> --}}
         </div>
      </div>
   </section>
   <section class="content">
     @yield('content')
   </section>
   <section class="footer">
     <div id="footer-container">
        <div id="footer-top">
            <div class="footer-logo">
              <a href="{{url($lnUrl)}}"><img class="footer-img" src="{{asset('dist/images/logo/logo.png')}}" width="100" height="100" alt=""></a>
              {{-- <div class="contact-links">
                <span class="fab fa-linkedin contact-icon"></span>
                <span class="fab fa-twitter contact-icon"></span>
                <span class="fab fa-youtube contact-icon"></span>
              </div> --}}
              
            </div>
            <div class="footer-content">
              <div class="footer-description">
                  {{App\Models\Other::where('key','footerText')->first()['value'.$langFlag]}}
              </div>
              <div id="footer-items">
                 <div class="footer-item-box">
                       <span class="footer-item">{{$content[9]}}</span>
                       <i class="footer-item">
                         {{App\Models\Other::where('key','footerAddress')->first()['value'.$langFlag]}}
                       </i>
                 </div>
                <div class="footer-item-box">
                      <span class="footer-item">{{$content[8]}}</span>
                      <a class="footer-item" href="{{url('about-us'.$lnUrl)}}">{{$content[6]}}</a>  
                      <a class="footer-item" href="{{url('contact-us'.$lnUrl)}}">{{$content[1]}}</a>
                      {{-- <a class="footer-item" href="https://email.mppc-co.com/owa">{{$content[26]}}</a> --}}
                      {{-- <a class="footer-item" href="http://185.110.30.177:8888/webkart">{{$content[27]}}</a> --}}
                      {{-- <a class="footer-item" href="http://185.110.30.177">ERP</a> --}}
                </div>
                <div class="footer-item-box">
                    <span class="footer-item">{{$content[10]}}</span>
                    <a class="footer-item" href="{{url('products'.$lnUrl)}}">{{$content[0]}}</a>
                    {{-- <a class="footer-item" href="{{url('auction')}}">{{$content[2]}}</a> --}}
                    <a class="footer-item" href="{{url('news'.$lnUrl)}}">{{$content[3]}}</a>
                    {{-- <a class="footer-item" href="{{url('gallery'.$lnUrl)}}">{{$content[4]}}</a> --}}
                    <a class="footer-item" href="{{url('environment')}}">{{$content[5]}}</a>
                </div>

              </div>
              <a referrerpolicy='origin' target='_blank' href='https://trustseal.enamad.ir/?id=338554&Code=2160ExAQxhyfICEQbt5n'><img referrerpolicy='origin' src='https://trustseal.enamad.ir/logo.aspx?id=338554&Code=2160ExAQxhyfICEQbt5n' alt='' style='cursor:pointer' Code='2160ExAQxhyfICEQbt5n'></a>

            </div>
        </div>
        <div id="footer-bottom">
               <div id="copy-right">
                  © 2024 - تمامی حقوق این سایت محفوظ میباشد
               </div>
               {{-- <div id="footer-bottom-links">
                  <a href="https://email.mppc-co.com/owa">{{$content[26]}}</a>
                  <a href="http://185.110.30.177:8888/webkart">{{$content[27]}}</a>
                  <a href="http://185.110.30.177">ERP</a>
               </div> --}}
        </div>
     </div>

     <div id="mobile-footer">
        <div class="footer-logo">
          <a href="{{url($lnUrl)}}"><img class="footer-img" src="{{asset('dist/images/logo/logo.png')}}" width="100" height="100" alt=""></a>
          
          <div class="contact-links">
            <span class="fab fa-linkedin contact-icon"></span>
            <span class="fab fa-twitter contact-icon"></span>
            <span class="fab fa-youtube contact-icon"></span>
          </div>
        </div>
        <div class="footer-description">
          {{App\Models\Other::where('key','footerText')->first()['value'.$langFlag]}}
        </div>
        <div class="footer-list">
          
          <div class="footer-item">
            <span>{{$content[9]}}</span>
            <label for="">
              <i class="fas fa-angle-left"></i>
            </label>
            <ul>
              
              <li>{{App\Models\Other::where('key','footerAddress')->first()['value'.$langFlag]}}</li>
            </ul>
          </div>
          <div class="footer-item">
            <span>{{$content[8]}}</span>
            <label for="">
              <i class="fas fa-angle-left"></i>
            </label>
                <ul>
                  <li><a class="footer-link" href="{{url('about-us'.$lnUrl)}}">{{$content[6]}}</a></li>
                  <li><a class="footer-link" href="{{url('contact-us'.$lnUrl)}}">{{$content[1]}}</a></li>
                  {{-- <li><a href="https://email.mppc-co.com/owa">{{$content[26]}}</a></li>
                  <li><a href="http://185.110.30.177:8888/webkart">{{$content[27]}}</a></li>
                  <li><a href="http://185.110.30.177">ERP</a></li>
                  <li>WebKart</li> --}}
                </ul>
          </div>
          <div class="footer-item">
            <span>{{$content[10]}}</span>
            <label for="">
              <i class="fas fa-angle-left"></i>
            </label>
                <ul>
                  <li><a class="footer-link" href="{{url('products'.$lnUrl)}}">{{$content[0]}}</a></li>
                  {{-- <li><a class="footer-link" href="{{url('auction')}}">{{$content[2]}}</a></li> --}}
                  <li><a class="footer-link" href="{{url('news'.$lnUrl)}}">{{$content[3]}}</a></li>
                  {{-- <li><a class="footer-link" href="{{url('gallery'.$lnUrl)}}">{{$content[4]}}</a></li> --}}
                  <li><a class="footer-link" href="{{url('environment')}}">{{$content[5]}}</a></li>
                </ul>
          </div>
          <div class="footer-item">
            <span>© 2024 - تمامی حقوق این سایت محفوظ میباشد</span>
            <label for="">
              <i class="fas fa-angle-left"></i>
            </label>
          </div>

        </div>
     </div>
   </section>
   <script src="{{asset('dist/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('dist/js/script.js')}}"></script>

   @if($errors->has('auth'))
   <script>
      document.getElementById('login-modal').classList.toggle('modal-active');
   </script>
   @endif
   @yield('js')
</body>
</html>
