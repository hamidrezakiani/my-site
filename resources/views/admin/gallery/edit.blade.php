@extends('admin/master')

@section('gallery') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش تصویر</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/galleries')}}">گالری</a></li>
              <li class="breadcrumb-item active">ویرایش تصویر</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">تصویر با موفقیت ویرایش شد.</label>
           </div>
        @endif
        <div class="row" style="padding: 25px">
            <form style="min-width: 400px;" action="{{url('admin/galleries/'.$gallery->id.'/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="_method" value="PUT"> --}}
               <div class="form-group">
                    <label for="title">عنوان انگلیسی</label>
                    <input class="form-control" style="direction: ltr" value="{{$gallery->title}}" name="title[en]" id="title">
                </div>
                <div class="form-group">
                    <label for="title_fa">عنوان فارسی</label>
                    <input class="form-control" value="{{$gallery->title_fa}}" name="title[fa]" id="title_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="title_ar">عنوان عربی</label>
                    <input class="form-control" value="{{$gallery->title_ar}}" name="title[ar]" id="title_ar">
                </div>
                @endcan
              <div class="form-group">
                 <br>
                 <img id="show-image" width="500" src="{{asset($gallery->url)}}" alt="">
                 <br>
                 <a class="btn btn-secondary mt-3" id="select-image-btn">تغییر تصویر</a>
                 <input onchange="readURL(this);" accept="image/*" style="display: none;" class="form-control" type="file" name="url" id="url">
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
