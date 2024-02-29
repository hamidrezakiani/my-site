@extends('admin/master')

@section('news') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">لیست اخبار</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">اخبار</li>
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
        <h5 class="modal-title" id="exampleModalLabel">حذف خبر</h5>
      </div>
      <form id="delete-form" action="" method="POST">
        @csrf
      <div class="modal-body">
            آیا میخواهید این خبر را حذف کنید؟
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
              <label class="text-success">خبر با موفقیت اضافه شد.</label>
           </div>
        @endif
        @if($errors->has('delete') && $errors->first('delete') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">خبر با موفقیت حذف شد.</label>
           </div>
        @endif
        <div class="row">
            <a href="{{url('admin/news/create')}}" class="btn btn-success mb-1">خبر جدید</a>
        </div>
        <div class="row">
            <table class="table table-bordered">
              <thead class="thead-dark">
                 <tr>
                    <th>ردیف</th>
                    <th style="width: 55%">عنوان</th>
                    <th>زمان</th>
                    <th>عملیات</th>
                 </tr>
              </thead>
              <tbody class="bg-light">
                 @foreach ($news as $index => $item)
                       <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$item->title_fa}}</td>
                        <td>{{verta($item->created_at)->format('H:i Y-m-d')}}</td>
                        <td>
                            <button class="btn btn-danger delete-news" data-toggle="modal" data-target="#deleteModal" data-id="{{$item->id}}">حذف</button>
                            <a href="{{url('admin/news/'.$item->id."/edit")}}" class="btn btn-primary">ویرایش</a>
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
      $('.delete-news').on('click',function(){
         const id = $(this).data('id');
         $('#delete-form').attr('action',`{{url('admin/news')}}/${id}/delete`);
      });
   </script>
@endSection
