@extends('admin/master')

@section('user') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">لیست کاربران</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">کابران</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <table class="table table-bordered">
              <thead class="thead-dark">
                 <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    @can('role')
                     <th>نقش</th>
                    @endcan
                    <th>عملیات</th>
                 </tr>
              </thead>
              <tbody class="bg-light">
                 @foreach ($users as $index => $user)
                     <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @can('role')
                          <td>{{$user->role->name ?? 'کاربر عادی'}}</td>
                        @endcan
                        <td>
                            <button class="btn btn-danger">حذف</button>
                            <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-primary">ویرایش</a>
                        </td>
                     </tr>
                 @endforeach
              </tbody>
            </table>
        </div>

      </div>
    </section>
@endSection
