@extends('admin/master')

@section('product') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش کاتالوگ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/products')}}">محصولات</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/products/'.$catalog->item->product->id.'/items')}}">زیرشاخه های {{$catalog->item->product->title_fa}}</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/items/'.$catalog->item->id.'/catalogs')}}">کاتالوگ های {{$catalog->item->name_fa}}</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">کاتالوگ با موفقیت ویرایش شد.</label>
           </div>
        @endif
        <div class="row" style="padding: 25px">
            <form style="min-width:100%;" action="{{url('admin/catalogs/'.$catalog->id.'/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="_method" value="PUT"> --}}
                <div class="form-group">
                    <label for="name">نام انگلیسی</label>
                    <input class="form-control" required style="direction: ltr" name="name[en]" id="name" value="{{$catalog->name}}">
                </div>
                <div class="form-group">
                    <label for="name_fa">نام فارسی</label>
                    <input class="form-control" required name="name[fa]" id="name_fa" value="{{$catalog->name_fa}}">
                </div>
                @can('arabic')
                <div class="form-group">
                    <label for="name_ar">نام عربی</label>
                    <input class="form-control" required name="name[ar]" id="name_ar" value="{{$catalog->name_ar}}">
                </div>
                @endcan
              <div class="form-group">
                 <label for="pdf">فایل pdf</label>
                 <input class="form-control" accept=".pdf" type="file" name="pdf" id="pdf">
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

@endSection
