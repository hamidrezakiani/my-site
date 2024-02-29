@extends('admin/master')

@section('home') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش صفحه اصلی</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">صفحه اصلی و دیگر محتوا</li>
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
            <form style="width: 100%" action="{{url('admin/other')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                 <label for="homeHeaderText">عنوان پاراگراف اول صفحه اصلی انگلیسی</label>
                 <textarea class="form-control" style="direction: ltr" required type="text" id="homeHeaderText" name="homeHeaderText[en]" rows="8">{!!$otherSettings['homeHeaderText']->value!!}</textarea>
              </div>
              <div class="form-group">
                <label for="homeHeaderText_fa">عنوان پاراگراف اول  صفحه اصلی فارسی</label>
                 <textarea class="form-control" required type="text" id="homeHeaderText_fa" name="homeHeaderText[fa]" rows="8">{!!$otherSettings['homeHeaderText']->value_fa!!}</textarea>
              </div>
              @can('arabic')
              <div class="form-group">
                <label for="homeHeaderText_ar">عنوان پاراگراف اول  صفحه اصلی عربی</label>
                 <textarea class="form-control" required type="text" id="homeHeaderText_ar" name="homeHeaderText[ar]" rows="8">{!!$otherSettings['homeHeaderText']->value_ar!!}</textarea>
              </div>
              @endcan
              <div class="form-group">
                 <label for="homeDescriptionText">متن پاراگراف اول صفحه اصلی انگلیسی</label>
                 <textarea class="form-control" style="direction: ltr" required type="text" id="homeDescriptionText" name="homeDescriptionText[en]" rows="8">{!!$otherSettings['homeDescriptionText']->value!!}</textarea>
              </div>
              <div class="form-group">
                <label for="homeDescriptionText_fa">متن پاراگراف اول  صفحه اصلی فارسی</label>
                 <textarea class="form-control" required type="text" id="homeDescriptionText_fa" name="homeDescriptionText[fa]" rows="8">{!!$otherSettings['homeDescriptionText']->value_fa!!}</textarea>
              </div>
               @can('arabic')
              <div class="form-group">
                <label for="homeDescriptionText_ar">متن پاراگراف اول  صفحه اصلی عربی</label>
                 <textarea class="form-control" required type="text" id="homeDescriptionText_ar" name="homeDescriptionText[ar]" rows="8">{!!$otherSettings['homeDescriptionText']->value_ar!!}</textarea>
              </div>
              @endcan
              <div class="form-group">
                <label for="homeEnvironmentImageLarge">تصویر محیط(بزرگ)</label>
                <br>
                <img id="show-larg-image" src="{{asset($otherSettings['homeEnvironmentImageLarge']->value)}}" width="400" alt="">
                <br>
                <br>
                <a class="btn btn-secondary mt-2" id="select-larg-image-btn">تغییر تصویر</a>
                <br>
                <input onchange="readUrlLargImage(this);" accept="image/*" style="display: none" type="file" class="form-control" id="homeEnvironmentImageLarge" name="homeEnvironmentImageLarge">
              </div>
              <div class="form-group">
                <label for="homeEnvironmentImageSmall">تصویر محیط(کوچک)</label>
                <br>
                <img id="show-small-image" src="{{asset($otherSettings['homeEnvironmentImageSmall']->value)}}" width="400" alt="">
                <br>
                <br>
                <a class="btn btn-secondary mt-2" id="select-small-image-btn">تغییر تصویر</a>
                <br>
                <input type="file" onchange="readUrlSmallImage(this);" style="display: none" accept="image/*" class="form-control" id="homeEnvironmentImageSmall" name="homeEnvironmentImageSmall">
              </div>
              <div class="form-group">
                 <label for="homeEnvironmentText">متن محیط صفحه اصلی انگلیسی</label>
                 <textarea rows="8" class="form-control" style="direction: ltr" required type="text" id="homeEnvironmentText" name="homeEnvironmentText[en]">{!!$otherSettings['homeEnvironmentText']->value!!}</textarea>
              </div>
              <div class="form-group">
                 <label for="homeEnvironmentText_fa">متن محیط صفحه اصلی فارسی</label>
                 <textarea rows="8" class="form-control" required type="text" id="homeEnvironmentText_fa" name="homeEnvironmentText[fa]">{!!$otherSettings['homeEnvironmentText']->value_fa!!}</textarea>
              </div>
               @can('arabic')
              <div class="form-group">
                 <label for="homeEnvironmentText_ar">متن محیط صفحه اصلی عربی</label>
                 <textarea rows="8" class="form-control" required type="text" id="homeEnvironmentText_ar" name="homeEnvironmentText[ar]">{!!$otherSettings['homeEnvironmentText']->value_ar!!}</textarea>
              </div>
              @endcan
              <div class="form-group">
                 <label for="footerText">متن فوتر انگلیسی</label>
                 <textarea rows="8" class="form-control" style="direction: ltr" required type="text" id="footerText" name="footerText[en]">{!!$otherSettings['footerText']->value!!}</textarea>
              </div>
              <div class="form-group">
                 <label for="footerText_fa">متن فوتر فارسی</label>
                 <textarea rows="8" class="form-control" required type="text" id="footerText_fa" name="footerText[fa]">{!!$otherSettings['footerText']->value_fa!!}</textarea>
              </div>
               @can('arabic')
              <div class="form-group">
                 <label for="footerText_ar">متن فوتر عربی</label>
                 <textarea rows="8" class="form-control" required type="text" id="footerText_ar" name="footerText[ar]">{!!$otherSettings['footerText']->value_ar!!}</textarea>
              </div>
              @endcan
              <div class="form-group">
                 <label for="marquee">متن بریکینگ نیوز انگلیسی</label>
                 <textarea rows="8" class="form-control" style="direction: ltr" required type="text" id="marquee" name="marquee[en]">{!!$otherSettings['marquee']->value!!}</textarea>
              </div>
              <div class="form-group">
                 <label for="marquee_fa">متن بریکینگ نیوز فارسی</label>
                 <textarea rows="8" class="form-control" required type="text" id="marquee_fa" name="marquee[fa]">{!!$otherSettings['marquee']->value_fa!!}</textarea>
              </div>
               @can('arabic')
              <div class="form-group">
                 <label for="marquee_ar">متن بریکینگ نیوز عربی</label>
                 <textarea rows="8" class="form-control" required type="text" id="marquee_ar" name="marquee[ar]">{!!$otherSettings['marquee']->value_ar!!}</textarea>
              </div>
              @endcan
              <div class="form-group">
                 <label for="footerAddress">آدرس فوتر انگلیسی</label>
                 <textarea rows="8" class="form-control" style="direction: ltr" required type="text" id="footerAddress" name="footerAddress[en]">{!!$otherSettings['footerAddress']->value!!}</textarea>
              </div>
              <div class="form-group">
                 <label for="footerAddress_fa">آدرس فوتر فارسی</label>
                 <textarea rows="8" class="form-control" required type="text" id="footerAddress_fa" name="footerAddress[fa]">{!!$otherSettings['footerAddress']->value_fa!!}</textarea>
              </div>
               @can('arabic')
              <div class="form-group">
                 <label for="footerAddress_ar">آدرس فوتر عربی</label>
                 <textarea rows="8" class="form-control" required type="text" id="footerAddress_ar" name="footerAddress[ar]">{!!$otherSettings['footerAddress']->value_ar!!}</textarea>
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
    $('#select-larg-image-btn').on('click',function(){
        $('#homeEnvironmentImageLarge').click();
    });
    function readUrlLargImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#show-larg-image').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
$('#select-small-image-btn').on('click',function(){
        $('#homeEnvironmentImageSmall').click();
    });
    function readUrlSmallImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#show-small-image').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endSection

