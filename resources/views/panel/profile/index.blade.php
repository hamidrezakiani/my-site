@extends('panel/master')
@section('profile') active @endSection
@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">اطلاعات کاربری</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if($errors->has('profile') && $errors->first('profile') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">.پروفایل با موفقیت بروزرسانی شد</label>
           </div>
        @endif
        <div class="row">
            <form id="profile-form" action="{{url('panel/profile')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group" style="flex:1">
                  <label for="name">نام</label>
                   @if($errors->has('name') && $errors->first('name'))
                    <br>
                    <label for="name" class="error-text">{{$errors->first('name')}}</label>
                   @endif
                  <input class="form-control" style="margin-bottom: 120px" type="text" value="{{Auth::user()->name}}" name="name" placeholder="نام خود را وارد کنید">

                  <strong class="text-danger">*اختیاری</strong>
                  <br>
                  <label for="password">رمز عبور جدید</label>
                  @if($errors->has('password') && $errors->first('password'))
                    <br>
                    <label for="password" class="error-text">{{$errors->first('password')}}</label>
                   @endif
                  <input class="form-control" type="password" name="password">
                  <label for="password_confirmation">تکرار رمز عبور</label>
                  <input type="password" class="form-control" name="password_confirmation">
              </div>
              <div class="form-group" style="flex:1;display: flex;flex-direction: column;justify-content: center;align-items: center">
                 {{-- <label for="image">عکس پروفایل</label>
                 <br> --}}
                 <div style="width: 200px;height: 200px;position: relative;overflow: hidden;border-radius: 100%;">
                    <img style="display: inline;margin: 0 auto;height: 100%;width: auto;" id="show-image" src="{{asset(Auth::user()->avatar ?? 'dist/images/user.png')}}" alt="">
                 </div>
                 <a class="btn btn-light mt-3 pt-1 pb-0 pr-4 pl-4" style="background-color: rgb(237, 238, 248)" id="select-image-btn"><i class="fa fa-pencil" style="color: rgb(162, 132, 231);font-size: 24px"></i></a>
                 <input onchange="readURL(this);" accept="image/*" style="display: none;" class="form-control" type="file" name="image" id="image">
                 <button type="submit" style="margin-top: 70px" class="btn btn-primary">ذخیره تغییرات</button>
               </div>
            </form>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endSection
@section('css')
  <style>
    .error-text{
       color: red;
       font-size: 14px;
       @if(isset($_GET['ln']) && $_GET['ln'] != 'en')
         text-align: right;
        @else
       text-align: left;
       @endif
       width: 80%;
     }
        #profile-form{
            width: 100%;
            display:flex;
            flex-direction: row;
            flex-wrap: wrap
        }

        @media only screen and (max-width: 700px) {
            #profile-form {
             flex-direction: column
        }
  </style>
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
