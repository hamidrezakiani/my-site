@extends('admin/master')

@section('role') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">لیست نقش ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">نقش ها</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">افزودن نقش  جدید</h5>
      </div>
      <form id="create-role-form" action="{{url('admin/roles')}}" method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group-lg">
                <label for="name">نام نقش</label>
                <input required oninvalid="setCustomValidity('نام نقش نمیتواند خالی باشد')" class="form-control" type="text" id="name" name="name" placeholder="نام نقش را وارد کنید">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
        <button type="submit" class="btn btn-success mr-3">افزودن</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ویرایش نقش</h5>
      </div>
      <form id="edit-form" action="" method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group-lg">
                <label for="edit-name">نام نقش</label>
                <input required oninvalid="setCustomValidity('نام نقش نمیتواند خالی باشد')" class="form-control" type="text" id="edit-name" name="name" placeholder="نام نقش را وارد کنید">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
        <button type="submit" class="btn btn-primary mr-3">ویرایش</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">حذف نقش</h5>
      </div>
      <form id="delete-form" action="" method="POST">
        @csrf
      <div class="modal-body">
            آیا میخواهید نقش "<strong id="delete-name"></strong>" را حذف کنید؟
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
           <div class="row">
              <label class="text-success">نقش با موفقیت اضافه شد.</label>
           </div>
        @endif
        @if($errors->has('update') && $errors->first('update') == 'SUCCESS')
           <div class="row">
              <label class="text-success">نقش با موفقیت ویرایش شد.</label>
           </div>
        @endif
        @if($errors->has('delete') && $errors->first('delete') == 'SUCCESS')
           <div class="row">
              <label class="text-success">نقش با موفقیت حذف شد.</label>
           </div>
        @endif
        <div class="row">
            <button class="btn btn-success mb-1" data-toggle="modal" data-target="#createModal">نقش جدید</button>
        </div>
        <div class="row">
            <table class="table table-bordered">
              <thead class="thead-dark">
                 <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>عملیات</th>
                 </tr>
              </thead>
              <tbody class="bg-light">
                 @foreach ($roles as $index => $role)
                     @if($role->id != 1)
                       <tr>
                        <td>{{$index}}</td>
                        <td class="role-name" data-id="{{$role->id}}">{{$role->name}}</td>
                        <td>
                            <button class="btn btn-danger delete-role" data-toggle="modal" data-target="#deleteModal" data-id="{{$role->id}}">حذف</button>
                            <button class="btn btn-primary mr-3 edit-role" data-toggle="modal" data-target="#editModal" data-id="{{$role->id}}">ویرایش</button>
                            <a href="{{url('admin/roles/'.$role->id)}}" class="btn btn-info mr-3">دسترسی ها</a>
                        </td>
                     </tr>
                     @endif
                 @endforeach
              </tbody>
            </table>
        </div>

      </div>
    </section>
@endSection


@section('js')
   <script>
      $('.edit-role').on('click',function(){
         const id = $(this).data('id');
         const name = $(`.role-name[data-id='${id}']`).html();
         $('#edit-name').val(name);
         $('#edit-form').attr('action',`{{url('admin/roles')}}/${id}/update`);
      });
      $('.delete-role').on('click',function(){
         const id = $(this).data('id');
         const name = $(`.role-name[data-id='${id}']`).html();
         $('#delete-name').html(name);
         $('#delete-form').attr('action',`{{url('admin/roles')}}/${id}/delete`);
      });
   </script>
@endSection
