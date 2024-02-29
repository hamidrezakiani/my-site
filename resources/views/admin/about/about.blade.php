@extends('admin/master')

@section('other') active @endSection
@section('about') active @endSection
@section('about-menu') menu-open @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش صفحه درباره ما</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">درباره ما</li>
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
            <form style="width: 100%" action="{{url('admin/about')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                 <label for="aboutText">متن درباره ما انگلیسی</label>
                 <textarea class="form-control" style="direction: ltr" required type="text" id="aboutText" name="aboutText[en]" rows="8">{{$aboutSettings['aboutText']->value}}</textarea>
              </div>
              <div class="form-group">
                <label for="aboutText_fa">متن درباره ما فارسی</label>
                 <textarea class="form-control" required type="text" id="aboutText_fa" name="aboutText[fa]" rows="8">{{$aboutSettings['aboutText']->value_fa}}</textarea>
              </div>
              @can('arabic')
              <div class="form-group">
                <label for="aboutText_ar">متن درباره ما عربی</label>
                 <textarea class="form-control" required type="text" id="aboutText_ar" name="aboutText[ar]" rows="8">{{$aboutSettings['aboutText']->value_ar}}</textarea>
              </div>
              @endcan
              <div>
                <label for="aboutImage">تصویر درباره ما</label>
                <br>
                 <img id="show-image" width="500" src="{{asset($aboutSettings['aboutImage']->value)}}" alt="">
                 <br>
                 <a class="btn btn-secondary mt-3 mb-3" id="select-image-btn">تغییر تصویر</a>
                <input type="file" accept="image/*" onchange="readURL(this);" style="display: none" class="form-control" id="aboutImage" name="aboutImage">
              </div>
              <div class="form-group">
                 <label for="slogan">شعار انگلیسی</label>
                 <input class="form-control" style="direction: ltr" required type="text" id="slogan" name="slogan[en]" value="{{$aboutSettings['slogan']->value}}">
              </div>
              <div class="form-group">
                 <label for="slogan_fa">شعار فارسی</label>
                 <input class="form-control" required type="text" id="slogan_fa" name="slogan[fa]" value="{{$aboutSettings['slogan']->value_fa}}">
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="slogan_ar">شعار عربی</label>
                 <input class="form-control" required type="text" id="slogan_ar" name="slogan[ar]" value="{{$aboutSettings['slogan']->value_ar}}">
              </div>
              @endcan
              <div class="form-group">
                 <label for="skillText">متن مهارت ها انگلیسی</label>
                 <textarea class="form-control" style="direction: ltr" required type="text" id="skillText" name="skillText[en]" rows="8">{{$aboutSettings['skillText']->value}}</textarea>
              </div>
              <div class="form-group">
                 <label for="skillText_fa">متن مهارت ها فارسی</label>
                 <textarea class="form-control" required type="text" id="skillText_fa" name="skillText[fa]" rows="8">{{$aboutSettings['skillText']->value_fa}}</textarea>
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="skillText_ar">متن مهارت ها عربی</label>
                 <textarea class="form-control" required type="text" id="skillText_ar" name="skillText[ar]" rows="8">{{$aboutSettings['skillText']->value_ar}}</textarea>
              </div>
              @endcan
              <div class="form-group">
                 <label for="philosophy">متن فلسفه انگلیسی</label>
                 <textarea class="form-control" style="direction: ltr" required type="text" id="philosophy" name="philosophy[en]" rows="8">{{$aboutSettings['philosophy']->value}}</textarea>
              </div>
              <div class="form-group">
                 <label for="philosophy_fa">متن فلسفه فارسی</label>
                 <textarea class="form-control" required type="text" id="philosophy_fa" name="philosophy[fa]" rows="8">{{$aboutSettings['philosophy']->value_fa}}</textarea>
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="philosophy_ar">متن فلسفه عربی</label>
                 <textarea class="form-control" required type="text" id="philosophy_ar" name="philosophy[ar]" rows="8">{{$aboutSettings['philosophy']->value_ar}}</textarea>
              </div>
              @endcan
              <div class="form-group">
                 <label for="whyUs">متن چرا ما انگلیسی</label>
                 <textarea class="form-control" style="direction: ltr" required type="text" id="whyUs" name="whyUs[en]" rows="8">{{$aboutSettings['whyUs']->value}}</textarea>
              </div>
              <div class="form-group">
                 <label for="whyUs_fa">متن چرا ما فارسی</label>
                 <textarea class="form-control" required type="text" id="whyUs_fa" name="whyUs[fa]" rows="8">{{$aboutSettings['whyUs']->value_fa}}</textarea>
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="whyUs_ar">متن چرا ما عربی</label>
                 <textarea class="form-control" required type="text" id="whyUs_ar" name="whyUs[ar]" rows="8">{{$aboutSettings['whyUs']->value_ar}}</textarea>
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

@section('js')
<script>
    $('#select-image-btn').on('click',function(){
        $('#aboutImage').click();
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
