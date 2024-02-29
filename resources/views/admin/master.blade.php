<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | داشبورد اول</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker-bs3.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/bootstrap-rtl.min.css')}}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/custom-style.css')}}">
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('?ln=fa')}}" class="nav-link">سایت</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">تماس</a>
      </li> --}}
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
      <!-- Messages Dropdown Menu -->
      @can('contact')
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">{{App\Models\Contact::where('isNew',1)->count()}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
          @php
             $newContacts = App\Models\Contact::where('isNew',1)->orderBy('created_at','DESC')->limit(5)->get();
          @endphp
          @foreach ($newContacts as $contact)
              <a href="{{url('admin/contacts/'.$contact->id)}}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('dist/images/user.png')}}" alt="User Avatar" class="img-size-50 ml-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{$contact->name}}
                  @if(App\Models\User::where('email',$contact->email)->first())
                    <span class="float-left text-sm text-success">کاربر سایت</span>
                  @else
                    <span class="float-left text-sm">کاربر مهمان</span>
                  @endif
                </h3>
                <p class="text-sm">{{substr($contact->subject,0,100)}}</p>
                @php
                  $minuteAgo = intVal((now()->timestamp - $contact->created_at->timestamp) / 60);
                  if($minuteAgo > 60)
                  {
                    $hoursAgo = intVal($minuteAgo / 60);
                     $hour = $hoursAgo % 24;
                  if($hoursAgo > 24)
                  {
                     $day = intVal($hoursAgo / 24);
                     $time = $day.' روز قبل ';
                  }
                  else {
                     $time = $hour.' ساعت قبل';
                  }
                  }
                  else {
                    $time = $minuteAgo.' دقیقه  قبل';
                  }

                @endphp
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> {{$time}} </p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          @endforeach
          <a href="{{url('admin/contacts')}}" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
        </div>
      </li>
      @endcan
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
          <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
            <span class="float-left text-muted text-sm">3 دقیقه</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
            <span class="float-left text-muted text-sm">12 ساعت</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file ml-2"></i> 3 گزارش جدید
            <span class="float-left text-muted text-sm">2 روز</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" style="font-weight: 500;font-size: 20px" href="{{url('logout?ln=fa')}}">خروج</a>
      </li>
      {{-- <li class="nav-item">

        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                class="fa fa-th-large"></i></a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/images/logo/MPPCc.jpg')}}" alt="Mppc Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          {{-- <div class="image">
            <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
          </div> --}}
          <div class="info">
            <a class="d-block">{{Auth::user()->name}} عزیز خوش آمدید</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            @can('admin')
            <li class="nav-item">
              <a href="{{url('admin/dashboard')}}" class="nav-link @yield('dashboard')">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  دشبورد
                </p>
              </a>
            </li>
            @endcan
            @can('user')
            <li class="nav-item">
              <a href="{{url('admin/users')}}" class="nav-link @yield('user')">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  کاربران
                </p>
              </a>
            </li>
            @endcan
            @can('role')
            <li class="nav-item">
              <a href="{{url('admin/roles')}}" class="nav-link @yield('role')">
                <i class="nav-icon fa fa-key"></i>
                <p>
                  نقش ها
                </p>
              </a>
            </li>
            @endcan
            @can('product')
            <li class="nav-item">
              <a href="{{url('admin/products')}}" class="nav-link @yield('product')">
                <i class="nav-icon fa fa-product-hunt"></i>
                <p>
                   محصولات
                </p>
              </a>
            </li>
            @endcan
            @can('news')
            <li class="nav-item">
              <a href="{{url('admin/news')}}" class="nav-link @yield('news')">
                <i class="nav-icon fa fa-newspaper-o"></i>
                <p>
                   اخبار
                </p>
              </a>
            </li>
            @endcan
            @can('contact')
            <li class="nav-item">
              <a href="{{url('admin/contacts')}}" class="nav-link @yield('message')">
                <i class="nav-icon fa fa-send"></i>
                <p>
                    پیام های کاربران
                  <span class="right badge badge-danger" style="font-size: 16px;padding:8px 8px 3px 8px;border-radius: 15px">{{App\Models\Contact::where('isNew',1)->count()}}</span>
                </p>
              </a>
            </li>
            @endcan
            @can('ticket')
            <li class="nav-item">
              <a href="{{url('admin/tickets')}}" class="nav-link @yield('ticket')">
                <i class="nav-icon fa fa-envelope"></i>
                <p>
                   تیکت ها
                </p>
              </a>
            </li>
            @endcan
            @can('slider')
            <li class="nav-item">
              <a href="{{url('admin/sliders')}}" class="nav-link @yield('slider')">
                <i class="nav-icon fa fa-windows"></i>
                <p>
                   اسلایدر
                </p>
              </a>
            </li>
            @endcan
            @can('gallery')
            <li class="nav-item">
              <a href="{{url('admin/galleries')}}" class="nav-link @yield('gallery')">
                <i class="nav-icon fa fa-photo"></i>
                <p>
                   گالری
                </p>
              </a>
            </li>
            @endcan
            @can('contactUs')
            <li class="nav-item">
              <a href="{{url('admin/contact-us')}}" class="nav-link @yield('contact')">
                <i class="nav-icon fa fa-phone"></i>
                <p>
                   تماس با ما
                </p>
              </a>
            </li>
            @endcan
            @can('aboutUs')
            <li class="nav-item has-treeview @yield('about-menu')">
              <a href="#" class="nav-link @yield('about')">
                <i class="nav-icon fa fa-book"></i>
                <p>
                  درباره ما
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/slogans')}}" class="nav-link @yield('slogan')">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>شعار ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/skills')}}" class="nav-link  @yield('skill')">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>مهارت ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/team')}}" class="nav-link @yield('team')">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>تیم</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/histories')}}" class="nav-link @yield('history')"">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>تاریخچه</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/about')}}" class="nav-link @yield('other')"">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>دیگر</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('home')
            <li class="nav-item">
              <a href="{{url('admin/other')}}" class="nav-link @yield('home')">
                <i class="nav-icon fa fa-home"></i>
                <p>
                   صفحه اصلی و دیگر محتوا
                </p>
              </a>
            </li>
            @endcan
            @can('home')
            <li class="nav-item">
              <a href="{{url('admin/environment')}}" class="nav-link @yield('environment')">
                <i class="nav-icon fa fa-file"></i>
                <p>
                   صفحه محیط
                </p>
              </a>
            </li>
            @endcan
            @can('home')
            <li class="nav-item">
              <a href="{{url('admin/auction')}}" class="nav-link @yield('auction')">
                <i class="nav-icon fa fa-file"></i>
                <p>
                   صفحه مناقصه ها و مزایده ها
                </p>
              </a>
            </li>
            @endcan
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    {{-- <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong> --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/https://code.jquery.com/ui/1.12.1/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('adminlte/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminlte/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminlte/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('adminlte/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
@yield('js')
</body>
</html>
