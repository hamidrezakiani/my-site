@extends('admin/master')

@section('slogan') active @endSection
@section('about') active @endSection
@section('about-menu') menu-open @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">شعار ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/about')}}">درباره ما</a></li>
              <li class="breadcrumb-item active">شعار ها</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">حذف شعار</h5>
      </div>
      <form id="delete-form" action="" method="POST">
        @csrf
      <div class="modal-body">
            آیا میخواهید این شعار را حذف کنید؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
        <button type="submit" class="btn btn-danger mr-3">بله</button>
      </div>
      </form>
    </div>
  </div>
</div>
        @if($errors->has('store') && $errors->first('store') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">شعار با موفقیت اضافه شد.</label>
           </div>
        @endif
        @if($errors->has('delete') && $errors->first('delete') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">شعار با موفقیت حذف شد.</label>
           </div>
        @endif
        <div class="row">
            <a href="{{url('admin/slogans/create')}}" class="btn btn-success mb-1">شعار جدید</a>
        </div>
        <div class="row">
            <table class="table table-bordered">
              <thead class="thead-dark">
                 <tr>
                    <th style="text-align: center">ردیف</th>
                    <th style="text-align: center">عنوان</th>
                    <th style="text-align: center">متن</th>
                    <th style="text-align: center">تصویر</th>
                    <th style="text-align: center">عملیات</th>
                 </tr>
              </thead>
              <tbody class="bg-light">
                   @foreach ($slogans as $index => $slogan)
                       <tr>
                          <td style="vertical-align: middle;text-align: center">{{$index + 1}}</td>
                          <td style="vertical-align: middle;text-align: center">
                            {{$slogan->title}}
                            <br>
                            {{$slogan->title_fa}}
                            @can('arabic')
                            <br>
                            {{$slogan->title_ar}}
                            @endcan
                          </td>
                          <td style="vertical-align: middle;text-align: center">
                            {{$slogan->text}}
                            <br>
                            {{$slogan->text_fa}}
                            @can('arabic')
                            <br>
                            {{$slogan->text_ar}}
                            @endcan
                          </td>
                          <td style="text-align: center"><img src="{{asset($slogan->image)}}" width="150px" alt=""></td>
                          <td style="vertical-align: middle;text-align: center">
                            <button class="btn btn-danger delete-slogan mt-1 pr-3 pl-3" data-toggle="modal" data-target="#deleteModal" data-id="{{$slogan->id}}">حذف</button>
                            <a href="{{url('admin/slogans/'.$slogan->id."/edit")}}" class="btn btn-primary mt-1">ویرایش</a>
                          </td>
                       </tr>
                   @endforeach
              </tbody>
            </table>
        </div>

      </div>
    </section>
@endSection


@section('js')
   <script>
      $('.delete-slogan').on('click',function(){
         const id = $(this).data('id');
         $('#delete-form').attr('action',`{{url('admin/slogans')}}/${id}/delete`);
      });
   </script>
@endSection
