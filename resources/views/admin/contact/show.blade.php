@extends('admin/master')

@section('news') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مشاهده پیام</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/contacts')}}">پیام های کاربران</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
            <div class="row bg-secondary">
                <div class="col-8">
                    <p><h4 style="display: inline">موضوع : </h4><h6 class="badge badge-warning" style="display: inline">{{$contact->subject}}</h6></p>
                </div>
                <div class="col-4 pt-4">
                    <span>{{verta($contact->created_at)->format('H:i  Y-m-d')}}</span>
                </div>
            </div>
            <div class="row pt-5 bg-white">
               <div class="col-8">
                 <p>{{$contact->message}}</p>
               </div>
               <div class="col-4">
                  <p>از {{$contact->name}}
                   @if(App\Models\User::where('email',$contact->email)->first())
                     <span class="badge badge-success">کاربر سایت</span>
                   @else
                     <span class="badge badge-secondary">کاربر میهمان</span>
                   @endif
                  </p>
                  <p>آدرس ایمیل : {{$contact->email}}</p>
               </div>
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
