@extends('admin.master')

@section('role') active @endSection

@section('content')
 <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">دسترسی های {{$role->name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">دسترسی ها</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
          <form action="{{url('admin/roles/'.$role->id.'/updatePermission')}}" method="POST">
             @csrf
             @foreach ($permissions as $index => $item)
                  <div class="form-group">
                    <input type="hidden" name="permission[{{$index}}][id]" value="{{$item->id}}">
                 <input name="permission[{{$index}}][value]" type="checkbox" @if($item->allow) checked @endif id="permission0" style="width: 25px;height: 25px">
                 <label style="font-size: 20px;" for="permission0">{{$item->name}}</label>
              </div>
              @endforeach
              <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
          </form>
      </div>
    </section>
@endSection
