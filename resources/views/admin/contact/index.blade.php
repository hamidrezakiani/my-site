@extends('admin/master')

@section('message') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">لیست پیام ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">خانه</a></li>
              <li class="breadcrumb-item active">پیام های کاربران</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <table class="table table-bordered">
              <thead class="thead-dark">
                 <tr>
                    <th style="text-align: center;vertical-align: middle">ردیف</th>
                    <th style="text-align: center;vertical-align: middle">نام کاربر</th>
                    <th style="text-align: center;vertical-align: middle">موضوع</th>
                    <th style="text-align: center;vertical-align: middle">وضعیت</th>
                    <th style="text-align: center;vertical-align: middle">زمان</th>
                    <th style="text-align: center;vertical-align: middle">عملیات</th>
                 </tr>
              </thead>
              <tbody class="bg-light">
                 @foreach ($contacts as $index => $contact)
                       <tr>
                        <td style="text-align: center;vertical-align: middle">{{$index + 1}}</td>
                        <td style="text-align: center;vertical-align: middle">{{$contact->name}}</td>
                        <td style="text-align: center;vertical-align: middle">{{$contact->subject}}</td>
                        <td style="text-align: center;vertical-align: middle">
                            @if($contact->isNew)
                            <span class="badge badge-warning pt-2 pb-2 pr-3 pl-3">جدید</span>
                            @else
                             <span class="badge badge-secondary pt-2 pb-2 pr-3 pl-3">خوانده شده</span>
                             @endif
                        </td>
                        <td style="text-align: center;vertical-align: middle">{{verta($contact->created_at)->format('H:i  Y-m-d')}}</td>
                        <td style="text-align: center;vertical-align: middle">
                            <a href="{{url('admin/contacts/'.$contact->id)}}" class="btn btn-success">مشاهده</a>
                        </td>
                     </tr>
                 @endforeach
              </tbody>
            </table>
        </div>

      </div>
    </section>
@endSection
