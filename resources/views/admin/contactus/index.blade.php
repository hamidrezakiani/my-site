@extends('admin/master')

@section('contact') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش تماس با ما</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">تماس با ما</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">تغییرات با موفقیت ذخیره شد</label>
           </div>
        @endif
        <div class="row" style="padding: 25px">
            <form style="width: 100%" action="{{url('admin/contact-us')}}" method="POST">
                @csrf
              <div class="form-group">
                 <label for="address">آدرس انگیسی</label>
                 <input class="form-control" style="direction: ltr" required type="text" id="address" name="address[en]" value="{{$contactSettings['address']->value}}">
              </div>
              <div class="form-group">
                 <label for="address_fa">آدرس فارسی</label>
                 <input class="form-control" required type="text" id="address_fa" name="address[fa]" value="{{$contactSettings['address']->value_fa}}">
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="address_ar">آدرس عربی</label>
                 <input class="form-control" required type="text" id="address_ar" name="address[ar]" value="{{$contactSettings['address']->value_ar}}">
              </div>
              @endcan
              <div class="form-group">
                 <label for="email">ایمیل</label>
                 <input class="form-control" style="direction: ltr" required type="email" id="email" name="email" value="{{$contactSettings['email']->value}}">
              </div>
              <div class="form-group">
                 <label for="phone_sales">تلفن فروش انگلیسی</label>
                 <input class="form-control" style="direction: ltr" required type="numeric" id="phone_sales" name="phone_sales[en]" value="{{$contactSettings['phone_sales']->value}}">
              </div>
              <div class="form-group">
                 <label for="phone_sales_fa">تلفن فروش فارسی</label>
                 <input class="form-control" style="direction: ltr" required type="numeric" id="phone_sales_fa" name="phone_sales[fa]" value="{{$contactSettings['phone_sales']->value_fa}}">
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="phone_sales_ar">تلفن فروش عربی</label>
                 <input class="form-control" style="direction: ltr" required type="numeric" id="phone_sales_ar" name="phone_sales[ar]" value="{{$contactSettings['phone_sales']->value_ar}}">
              </div>
              @endcan
              <div class="form-group">
                 <label for="phone_support">تلفن پشتیبانی انگلیسی</label>
                 <input class="form-control" style="direction: ltr" required type="numeric" id="phone_support" name="phone_support[en]" value="{{$contactSettings['phone_support']->value}}">
              </div>
              <div class="form-group">
                 <label for="phone_support_fa">تلفن پشتیبانی فارسی</label>
                 <input class="form-control" style="direction: ltr" required type="numeric" id="phone_support_fa" name="phone_support[fa]" value="{{$contactSettings['phone_support']->value_fa}}">
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="phone_support_ar">تلفن پشتیبانی عربی</label>
                 <input class="form-control" style="direction: ltr" required type="numeric" id="phone_support_ar" name="phone_support[ar]" value="{{$contactSettings['phone_support']->value_ar}}">
              </div>
              @endcan
              <div class="form-group">
                 <label for="days">روز ها انگلیسی</label>
                 <input class="form-control" style="direction: ltr" required type="text" id="days" name="days[en]" value="{{$contactSettings['days']->value}}">
              </div>
              <div class="form-group">
                 <label for="days_fa">روز ها فارسی</label>
                 <input class="form-control" required type="text" id="days_fa" name="days[fa]" value="{{$contactSettings['days']->value_fa}}">
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="days_ar">روز ها عربی</label>
                 <input class="form-control" required type="text" id="days_ar" name="days[ar]" value="{{$contactSettings['days']->value_ar}}">
              </div>
              @endcan
              <div class="form-group">
                 <label for="hours">ساعات انگلیسی</label>
                 <input  class="form-control" style="direction: ltr" required type="text" id="hours" name="hours[en]" value="{{$contactSettings['hours']->value}}">
              </div>
              <div class="form-group">
                 <label for="hours_fa">ساعات فارسی</label>
                 <input class="form-control" required type="text" id="hours_fa" name="hours[fa]" value="{{$contactSettings['hours']->value_fa}}">
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="hours_ar">ساعات عربی</label>
                 <input class="form-control" required type="text" id="hours_ar" name="hours[ar]" value="{{$contactSettings['hours']->value_ar}}">
              </div>
              @endcan
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

