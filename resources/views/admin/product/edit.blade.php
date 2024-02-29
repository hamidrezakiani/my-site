@extends('admin/master')

@section('product') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش محصول</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/products')}}">محصولات</a></li>
              <li class="breadcrumb-item active">ویرایش محصول</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">محصول با موفقیت ویرایش شد.</label>
           </div>
        @endif
        <div class="row" style="padding: 25px">
            <form style="min-width:100%;" action="{{url('admin/products/'.$product->id.'/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="_method" value="PUT"> --}}

               <div class="form-group">
                    <label for="title">نام انگلیسی</label>
                    <input class="form-control" style="direction: ltr" required value="{{$product->title}}" name="title[en]" id="title">
                </div>
                <div class="form-group">
                    <label for="title_fa">نام فارسی</label>
                    <input class="form-control" value="{{$product->title_fa}}" required name="title[fa]" id="title_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="title_ar">نام عربی</label>
                    <input class="form-control" value="{{$product->title_ar}}" required name="title[ar]" id="title_ar">
                </div>
                @endcan
                <div class="form-group">
                    <label for="text">متن انگلیسی</label>
                    <textarea rows="8" class="form-control" required style="direction: ltr" name="text[en]" id="text">{{$product->text}}</textarea>
                </div>
                <div class="form-group">
                    <label for="text_fa">متن فارسی</label>
                    <textarea rows="8" class="form-control" required name="text[fa]" id="text_fa">{{$product->text_fa}}</textarea>
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="text_ar">متن عربی</label>
                    <textarea rows="8" class="form-control" required name="text[ar]" id="text_ar">{{$product->text_ar}}</textarea>
                </div>
                @endcan
              <div class="form-group">
                 <label for="image">تصویر</label>
                 <br>
                 <img id="show-image" width="500" src="{{asset($product->image)}}" alt="">
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
