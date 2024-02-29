@extends('panel/master')

@section('control') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">کنترل</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">تغییرات با موفقیت ذخیره شد</label>
           </div>
        @endif
        <div class="row" style="padding: 25px">
            <form id="edit-form" style="width: 100%" action="{{url('panel/control')}}" method="POST" enctype="multipart/form-data">
                @csrf
               @foreach ($controls as $control)
                <div class="form-group">
                  <label for="{{$control->key}}">{{$control->name}}</label>
                  <input name="{{$control->key}}" id="{{$control->key}}" @if($control->enable) checked @endif class="form-control" style="width: 25px;height: 25px" type="checkbox">
                </div>
               @endforeach
              <div class="form-group" style="text-align: center">
                <button style="submit" id="save-change" class="btn btn-primary">ثبت تغییرات</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')

@endSection
