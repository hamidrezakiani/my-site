@extends('admin/master')

@section('user') active @endSection

@section('css')
  <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/select2.min.css')}}">
@endSection

@section('js')
  <script src="{{asset('adminlte/plugins/select2/select2.full.min.js')}}"></script>
@endSection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش کاربر</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/users')}}">کابران</a></li>
              <li class="breadcrumb-item active">ویرایش</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
           <div class="col-md-6">
             <form action="{{url('admin/users/'.$user->id.'/update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="label" for="name">نام</label>
               <input value="{{$user->name}}" class="form-control" type="text" id="name" name="name">

                </div>
                <div class="form-group">
                     <label class="label" for="email">ایمیل</label>
               <input value="{{$user->email}}" class="form-control" type="text" id="email" name="email">

                </div>
                @can('role')
                   <div class="form-group">
                     <label class="label" for="role">نقش</label>
               <select class="form-control select2" name="role_id" id="role">
                  @foreach ($roles as $role)
                      <option value="{{$role->id}}" @if ($user->role_id == $role->id) selected @endif>{{$role->name}}</option>
                  @endforeach
                  <option value="{{NULL}}" @if(!$user->role) selected @endif>کابر عادی</option>
               </select>
                </div>
                @endcan
               <br>
               <div class="form-group">
                    <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
               </div>
            </form>
           </div>
        </div>

      </div>
    </section>
@endSection
