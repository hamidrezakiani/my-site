@extends('admin/master')

@section('product') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">افزودن زیرشاخه برای {{$product->title_fa}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/products')}}">محصولات</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/products/'.$product->id.'/items')}}">زیرشاخه های {{$product->title_fa}}</a></li>
              <li class="breadcrumb-item active">زیرشاخه جدید</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 25px">
            <form style="min-width: 100%;" action="{{url('admin/products/'.$product->id.'/items')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="form-group">
                    <label for="name">نام انگلیسی</label>
                    <input class="form-control" style="direction: ltr" required name="name[en]" id="name">
              </div>
              <div class="form-group">
                    <label for="name_fa">نام فارسی</label>
                    <input class="form-control" name="name[fa]" required id="name_fa">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="name_ar">نام عربی</label>
                    <input class="form-control" name="name[ar]" required id="name_ar">
                </div>
                @endcan
              <div class="form-group">
                 <label for="pdf">فایل pdf</label>
                 <input class="form-control" accept=".pdf" required type="file" name="pdf" id="pdf">
              </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ثبت زیرشاخه</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')

@endSection
