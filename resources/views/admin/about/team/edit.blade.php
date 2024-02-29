@extends('admin/master')

@section('team') active @endSection
@section('about') active @endSection
@section('about-menu') menu-open @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش شخص</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/about')}}">درباره ما</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/team')}}">تیم</a></li>
              <li class="breadcrumb-item active">ویرایش شخض</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">شخص با موفقیت ویرایش شد.</label>
           </div>
        @endif
        <div class="row" style="padding: 25px">
            <form style="min-width: 400px;" action="{{url('admin/team/'.$person->id.'/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="_method" value="PUT"> --}}
                <div class="form-group">
                    <label for="name">نام انگلیسی</label>
                    <input class="form-control" style="direction: ltr" value="{{$person->name}}" name="name[en]" id="name">
                </div>
                <div class="form-group">
                    <label for="name_fa">نام فارسی</label>
                    <input class="form-control" value="{{$person->name_fa}}" name="name[fa]" id="name_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="name_ar">نام عربی</label>
                    <input class="form-control" value="{{$person->name_ar}}" name="name[ar]" id="name_ar">
                </div>
                @endcan
                <div class="form-group">
                    <label for="description">توضیحات انگلیسی</label>
                    <input class="form-control" style="direction: ltr" value="{{$person->description}}" name="description[en]" id="description">
                </div>
                <div class="form-group">
                    <label for="description_fa">توضیحات فارسی</label>
                    <input class="form-control" value="{{$person->description_fa}}" name="description[fa]" id="description_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="description_ar">توضیحات عربی</label>
                    <input class="form-control" value="{{$person->description_ar}}" name="description[ar]" id="description_ar">
                </div>
                @endcan
              <div class="form-group">
                 <label for="image">تصویر</label>
                 <br>
                 <img id="show-image" width="500" src="{{asset($person->image)}}" alt="">
                 <br>
                 <a class="btn btn-secondary mt-3" id="select-image-btn">تغییر تصویر</a>
                 <input onchange="readURL(this);" accept="image/*" style="display: none;" class="form-control" type="file" name="image" id="image">
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
