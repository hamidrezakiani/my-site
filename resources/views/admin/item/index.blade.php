@extends('admin/master')

@section('product') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">زیرشاخه های {{$product->title_fa}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('admin/products')}}">محصولات</a></li>
              <li class="breadcrumb-item active">زیرشاخه ها</li>
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
        <h5 class="modal-title" id="exampleModalLabel">حذف زیرشاخه</h5>
      </div>
      <form id="delete-form" action="" method="POST">
        @csrf
      <div class="modal-body">
            آیا میخواهید این زیرشاخه را حذف کنید؟
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
              <label class="text-success">زیرشاخه با موفقیت اضافه شد.</label>
           </div>
        @endif
        @if($errors->has('delete') && $errors->first('delete') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">زیرشاخه با موفقیت حذف شد.</label>
           </div>
        @endif
        <div class="row">
            <a href="{{url('admin/products/'.$product->id.'/items/create')}}" class="btn btn-success mb-1">زیرشاخه جدید</a>
        </div>
        <div class="row">
            <table class="table table-bordered">
              <thead class="thead-dark">
                 <tr>
                    <th style="text-align: center">ردیف</th>
                    <th style="text-align: center">نام</th>
                    <th style="text-align: center">فایل</th>
                    <th style="text-align: center">عملیات</th>
                 </tr>
              </thead>
              <tbody class="bg-light">
                   @foreach ($product->items as $index => $item)
                       <tr>
                          <td style="vertical-align: middle;text-align: center">{{$index + 1}}</td>
                          <td style="vertical-align: middle;text-align: center">
                            {{$item->name}}
                            <br>
                            {{$item->name_fa}}
                            @can('arabic')
                            <br>
                            {{$item->name_ar}}
                            @endcan
                          </td>
                          <td style="text-align: center"><a href="{{asset($item->pdf)}}" target="blanck">فایل</a></td>
                          <td style="vertical-align: middle;text-align: center">
                            <button class="btn btn-danger delete-item" data-toggle="modal" data-target="#deleteModal" data-id="{{$item->id}}">حذف</button>
                            <a href="{{url('admin/items/'.$item->id."/edit")}}" class="btn btn-primary">ویرایش</a>
                            <a href="{{url('admin/items/'.$item->id."/catalogs")}}" class="btn btn-warning">کاتالوگ ها</a>
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
      $('.delete-item').on('click',function(){
         const id = $(this).data('id');
         $('#delete-form').attr('action',`{{url('admin/items')}}/${id}/delete`);
      });
   </script>
@endSection
