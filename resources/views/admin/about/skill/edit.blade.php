@extends('admin/master')

@section('skill') active @endSection
@section('about') active @endSection
@section('about-menu') menu-open @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش مهارت</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/about')}}">درباره ما</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/skills')}}">مهارت ها</a></li>
              <li class="breadcrumb-item active">ویرایش مهارت</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">مهارت با موفقیت ویرایش شد.</label>
           </div>
        @endif
        <div class="row" style="padding: 25px">
            <form style="min-width: 400px;" action="{{url('admin/skills/'.$skill->id.'/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="_method" value="PUT"> --}}
                <div class="form-group">
                    <label for="title">عنوان انگلیسی</label>
                    <input class="form-control" style="direction: ltr" name="title[en]" value="{{$skill->title}}" id="title">
                </div>
                <div class="form-group">
                    <label for="title_fa">عنوان فارسی</label>
                    <input class="form-control" name="title[fa]" value="{{$skill->title_fa}}" id="title_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="title_ar">عنوان عربی</label>
                    <input class="form-control" name="title[ar]" value="{{$skill->title_ar}}" id="title_ar">
                </div>
                @endcan
                <div class="form-group">
                    <label for="value">درصد</label>
                    <input type="number" max="100" min="0" class="form-control" name="value" value="{{$skill->value}}" id="value">
                </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ثبت تغییرات</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')
<script>
    document.getElementById("value").addEventListener("keyup", function() {
  let v = parseInt(this.value);
  if (v < 1) this.value = 1;
  if (v > 100) this.value = 100;
});
document.getElementById("value").addEventListener("change", function() {
  let v = parseInt(this.value);
  if (v < 1) this.value = 1;
  if (v > 100) this.value = 100;
});
  </script>
@endSection
