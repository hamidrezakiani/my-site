@extends('admin/master')

@section('news') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> ویرایش خبر</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">ویرایش خبر</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">خبر با موفقیت ویرایش شد.</label>
           </div>
        @endif
        <div class="row" style="padding: 25px">
            <form style="width: 100%" action="{{url('admin/news/'.$news->id.'/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان انگلیسی خبر</label>
                    <textarea class="form-control" required style="direction:ltr" name="title[en]" id="title" cols="60" rows="2">{!!$news->title!!}</textarea>
                </div>
                <div class="form-group">
                    <label for="title_fa">عنوان فارسی خبر</label>
                    <textarea class="form-control" required name="title[fa]" id="title_fa" cols="60" rows="2">{!!$news->title_fa!!}</textarea>
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="title_ar">عنوان عربی خبر</label>
                    <textarea class="form-control" required name="title[ar]" id="title_ar" cols="60" rows="2">{!!$news->title_ar!!}</textarea>
                </div>
                @endcan
                <div class="form-group">
                 <label for="editor2">متن انگلیسی خبر</label>
               <textarea name="text[en]"  id="editor1" style="width: 100%;direction: ltr" placeholder="متن خبر را وارد کنید">{!!$news->text!!}</textarea>
              </div>
                <div class="form-group">
                 <label for="editor1">متن فارسی خبر</label>
               <textarea name="text[fa]"  id="editor2"  style="width: 100%;" placeholder="متن خبر را وارد کنید">{!!$news->text_fa!!}</textarea>
               </div>
               @can('arabic')
               <div class="form-group">
                 <label for="editor3">متن عربی خبر</label>
               <textarea name="text[ar]"  id="editor3"  style="width: 100%;" placeholder="متن خبر را وارد کنید">{!!$news->text_ar!!}</textarea>
               </div>
               @endcan
              <div class="form-group">
                 <label for="image">تصویر خبر</label>
                 <br>
                 <img id="show-image" width="500" src="{{asset($news->image)}}" alt="">
                 <br>
                 <a class="btn btn-secondary mt-3" id="select-image-btn">تغییر تصویر</a>
                 <input onchange="readURL(this);" accept="image/*" class="form-control" style="display:none" type="file" name="image" id="image">
              </div>
              <div class="form-group">
                  <label for="display">وضعیت انتشار</label>
                  <input @if($news->display) checked @endif name="display" id="display" class="form-control" style="width: 25px;height: 25px" type="checkbox">
              </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-primary">ثبت تغییرات</button>
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
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#show-image').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
  $(function () {
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
      })
      .catch(function (error) {
        console.error(error)
      })

      ClassicEditor
      .create(document.querySelector('#editor2'))
      .then(function (editor) {
      })
      .catch(function (error) {
        console.error(error)
      })

      ClassicEditor
      .create(document.querySelector('#editor3'))
      .then(function (editor) {
      })
      .catch(function (error) {
        console.error(error)
      })
  });
</script>
@endSection
