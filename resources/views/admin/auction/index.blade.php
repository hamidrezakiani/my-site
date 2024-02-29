@extends('admin/master')

@section('auction') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش صفحه مناقضه ها و مزایده ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">صفحه مناقضه ها و مزایده ها</li>
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
            <form style="width: 100%" action="{{url('admin/auction')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                 <label for="title">عنوان انگلیسی</label>
                 <input class="form-control" style="direction: ltr" required type="text" id="title" name="title[en]" value="{{$auction['title']->value}}">
              </div>
              <div class="form-group">
                 <label for="title_fa">عنوان فارسی</label>
                 <input class="form-control" required type="text" id="title_fa" name="title[fa]" value="{{$auction['title']->value_fa}}">
              </div>
              @can('arabic')
              <div class="form-group">
                 <label for="title_ar">عنوان عربی</label>
                 <input class="form-control" required type="text" id="title_ar" name="title[ar]" value="{{$auction['title']->value_ar}}">
              </div>
              @endcan
              <div class="form-group" style="text-align:left">
                 <label for="text">متن انگلیسی</label>
                 <textarea class="form-control" required type="text"id="text" name="text[en]" rows="8">{!!$auction['text']->value!!}</textarea>
              </div>
              <div class="form-group">
                <label for="text_fa">متن فارسی</label>
                 <textarea class="form-control" required type="text" id="text_fa" name="text[fa]" rows="8">{!!$auction['text']->value_fa!!}</textarea>
              </div>
               @can('arabic')
              <div class="form-group">
                <label for="text_ar">متن عربی</label>
                 <textarea class="form-control" required type="text" id="text_ar" name="text[ar]" rows="8">{!!$auction['text']->value_ar!!}</textarea>
              </div>
              @endcan
              <div class="form-group">
                <label for="image">تصویر اول</label>
                <br>
                <img id="image-one" src="{{asset($auction['image']->value ?? '')}}" width="400" alt="">
                <br>
                <br>
                <a class="btn btn-secondary mt-2" id="select-image-btn">تغییر تصویر</a>
                <br>
                <input onchange="readUrlImage(this);" accept="image/*" style="display: none" type="file" class="form-control" id="image" name="image">
              </div>
              <div class="form-group">
                <label for="image1">تصویر دوم</label>
                <br>
                <img id="image-two" src="{{asset($auction['image1']->value ?? '')}}" width="400" alt="">
                <br>
                <br>
                <a class="btn btn-secondary mt-2" id="select-image1-btn">تغییر تصویر</a>
                <br>
                <input type="file" onchange="readUrlImage1(this);" style="display: none" accept="image/*" class="form-control" id="image1" name="image1">
              </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')
<script src="{{asset('adminlte/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
    $('#select-image-btn').on('click',function(){
        $('#image').click();
    });
    function readUrlImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#image-one').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
$('#select-image1-btn').on('click',function(){
        $('#image1').click();
    });
    function readUrlImage1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#image-two').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$(function () {
    ClassicEditor
      .create(document.querySelector('#text'))
      .then(function (editor) {
      })
      .catch(function (error) {
        console.error(error)
      })

      ClassicEditor
      .create(document.querySelector('#text_fa'))
      .then(function (editor) {
      })
      .catch(function (error) {
        console.error(error)
      })

      ClassicEditor
      .create(document.querySelector('#text_ar'))
      .then(function (editor) {
      })
      .catch(function (error) {
        console.error(error)
      })
  });
</script>
@endSection

