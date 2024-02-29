@extends('admin/master')

@section('product') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">افزودن کاتالوگ برای {{$item->name_fa}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/products')}}">محصولات</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/products/'.$item->product->id.'/items')}}">زیرشاخه های {{$item->product->title_fa}}</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/items/'.$item->id.'/catalogs')}}">کاتالوگ های {{$item->name_fa}}</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 25px">
            <form style="min-width: 100%;" action="{{url('admin/items/'.$item->id.'/catalogs')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">نام انگلیسی</label>
                    <input class="form-control"required style="direction: ltr" name="name[en]" id="name">
                </div>
                <div class="form-group">
                    <label for="name_fa">نام فارسی</label>
                    <input class="form-control" required name="name[fa]" id="name_fa">
                </div>
                @can('arabic')
               <div class="form-group">
                    <label for="name_ar">نام عربی</label>
                    <input class="form-control" required name="name[ar]" id="name_ar">
                </div>
                @endcan
              <div class="form-group">
                 <label for="pdf">فایل pdf</label>
                 <input class="form-control" accept=".pdf" required type="file" name="pdf" id="pdf">
              </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ثبت کاتالوگ</button>
              </div>
            </form>
        </div>
      </div>
    </section>
@endSection

@section('js')

@endSection
