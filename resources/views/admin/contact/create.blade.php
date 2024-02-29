@extends('admin/master')

@section('news') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">افزودن خبر جدید</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">خبر جدید</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 25px">
            <form style="width: 100%" action="{{url('admin/news')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title_fa">عنوان فارسی خبر</label>
                    <textarea class="form-control" required name="title_fa" id="title_fa" cols="60" rows="2"></textarea>
                </div>
                <div class="form-group">
                 <label for="editor1">متن فارسی خبر</label>
               <textarea name="text_fa"  id="editor2" required style="width: 100%;" placeholder="متن خبر را وارد کنید"></textarea>
               <div class="form-group">
                    <label for="title">عنوان انگلیسی خبر</label>
                    <textarea class="form-control" required style="direction: ltr" name="title" id="title" cols="60" rows="2"></textarea>
                </div>
               </div>
                <div class="form-group">
                 <label for="editor2">متن انگلیسی خبر</label>
               <textarea name="text"  id="editor1" required style="width: 100%;direction: ltr" placeholder="متن خبر را وارد کنید"></textarea>
              </div>
              <div class="form-group">
                 <label for="image">تصویر خبر</label>
                 <input class="form-control" accept="image/*" required type="file" name="image" id="image">
              </div>
              <div class="form-group">
                  <label for="display">وضعیت انتشار</label>
                  <input name="dispaly" id="display" class="form-control" style="width: 25px;height: 25px" type="checkbox">
              </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ثبت خبر</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')
<script src="{{asset('adminlte/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
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
  });
</script>
@endSection
