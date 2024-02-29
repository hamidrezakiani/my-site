@extends('admin/master')

@section('history') active @endSection
@section('about') active @endSection
@section('about-menu') menu-open @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">افزودن رخداد جدید</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/about')}}">درباره ما</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/histories')}}">تاریخچه</a></li>
              <li class="breadcrumb-item active">رخداد جدید</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 25px">
            <form style="min-width: 400px;" action="{{url('admin/histories')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="year">سال انگلیسی</label>
                    <input class="form-control" style="direction: ltr" name="year[en]" id="year">
                </div>
                <div class="form-group">
                    <label for="year_fa">سال فارسی</label>
                    <input class="form-control" name="year[fa]" id="year_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="year_ar">سال عربی</label>
                    <input class="form-control" name="year[ar]" id="year_ar">
                </div>
                @endcan
                <div class="form-group">
                    <label for="text">رخداد انگلیسی</label>
                    <input class="form-control" style="direction: ltr" name="text[en]" id="text">
                </div>
                <div class="form-group">
                    <label for="text_fa">رخداد فارسی</label>
                    <input class="form-control" name="text[fa]" id="text_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="text_ar">رخداد عربی</label>
                    <input class="form-control" name="text[ar]" id="text_ar">
                </div>
                @endcan
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ثبت رخداد </button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')

@endSection
