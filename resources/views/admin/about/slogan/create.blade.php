@extends('admin/master')

@section('slogan') active @endSection
@section('about') active @endSection
@section('about-menu') menu-open @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">افزودن شعار جدید</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/about')}}">درباره ما</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/slogans')}}">شعار ما</a></li>
              <li class="breadcrumb-item active">شعار جدید</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 25px">
            <form style="min-width: 400px;" action="{{url('admin/slogans')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان انگلیسی</label>
                    <input class="form-control" required style="direction: ltr" name="title[en]" id="title">
                </div>
                <div class="form-group">
                    <label for="title_fa">عنوان فارسی</label>
                    <input class="form-control" required name="title[fa]" id="title_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="title_ar">عنوان عربی</label>
                    <input class="form-control" required name="title[ar]" id="title_ar">
                </div>
                @endcan
                <div class="form-group">
                    <label for="text">توضیحات انگلیسی</label>
                    <input class="form-control" required style="direction: ltr" name="text[en]" id="text">
                </div>
                <div class="form-group">
                    <label for="text_fa">توضیحات فارسی</label>
                    <input class="form-control" required name="text[fa]" id="text_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="text_ar">توضیحات عربی</label>
                    <input class="form-control" required name="text[ar]" id="text_ar">
                </div>
                @endcan
              <div class="form-group">
                 <label for="image">تصویر</label>
                 <br>
                 <img id="show-image" width="500" src="" alt="">
                 <br>
                 <a class="btn btn-secondary mt-3" id="select-image-btn">انتخاب تصویر</a>
                 <input onchange="readURL(this);" required accept="image/*" style="display: none;" class="form-control" type="file" name="image" id="image">
              </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ثبت شعار</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')
<script>
    $('#select-image-btn').on('click',function(){
        $('#image').click();
    });
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#show-image').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endSection
