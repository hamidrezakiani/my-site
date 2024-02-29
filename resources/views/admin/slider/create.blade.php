@extends('admin/master')

@section('slider') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">افزودن اسلاید جدید</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/sliders')}}">اسلایدر</a></li>
              <li class="breadcrumb-item active">اسلاید جدید</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 25px">
            <form style="min-width: 400px;" action="{{url('admin/sliders')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="form-group">
                    <label for="title">عنوان انگلیسی</label>
                    <input class="form-control" style="direction:ltr" name="title[en]" id="title">
                </div>
                <div class="form-group">
                    <label for="title_fa">عنوان فارسی</label>
                    <input class="form-control" name="title[fa]" id="title_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="title_ar">عنوان عربی</label>
                    <input class="form-control" name="title[ar]" id="title_ar">
                </div>
                @endcan
               </div>
              <div class="form-group mr-3">
                 <label for="url">تصویر</label>
                 <br>
                 <img id="show-image" width="500" src="" alt="">
                 <br>
                 <a class="btn btn-secondary mt-3" id="select-image-btn">انتخاب تصویر</a>
                 <input onchange="readURL(this);" accept="image/*" style="display: none;" class="form-control" type="file" name="url" id="url">
              </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ثبت اسلایدر</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')
<script>
    $('#select-image-btn').on('click',function(){
        $('#url').click();
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
