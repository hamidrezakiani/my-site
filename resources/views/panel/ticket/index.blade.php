@extends('panel/master')
@section('ticket') active @endSection
@section('content')
  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">تیکت ها</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if($errors->has('ticket') && $errors->first('ticket') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">.تیکت با موفقیت ارسال شد</label>
           </div>
        @endif
        <div class="row">
            <a href="{{url('panel/tickets/create')}}" class="btn btn-success mb-1">ارسال تیکت جدید</a>
        </div>
        <div class="row">
            <table class="table table-bordered">
              <thead class="thead-dark">
                 <tr>
                    <th style="text-align: center">ردیف</th>
                    <th style="text-align: center">موضوع</th>
                    <th style="text-align: center">اولویت</th>
                    <th style="text-align: center">زمان</th>
                    <th style="text-align: center">وضعیت</th>
                    <th style="text-align: center">عملیات</th>
                 </tr>
              </thead>
              <tbody class="bg-light">
                   @foreach ($tickets as $index => $ticket)
                       <tr>
                          <td style="vertical-align: middle;text-align: center">{{$index + 1}}</td>
                          <td style="vertical-align: middle;text-align: center">{{$ticket->subject}}</td>
                          <td style="vertical-align: middle;text-align: center">
                            @switch($ticket->important)
                                @case('LOW')
                                      <span class="badge-secondary pr-2 pl-2 pt-1 pb-1" style="border-radius: 6px">پایین</span>
                                    @break
                                @case('MIDDLE')
                                      <span class="badge-warning pr-2 pl-2 pt-1 pb-1" style="border-radius: 6px">متوسط</span>
                                    @break
                                @default
                                      <span class="badge-success pr-2 pl-2 pt-1 pb-1" style="border-radius: 6px">بالا</span>
                            @endswitch
                          </td>
                          <td style="text-align: center;vertical-align: middle">
                            {{verta($ticket->created_at)->format('h:i Y-m-d')}}
                          </td>
                          <td style="text-align: center;vertical-align: middle">
                             @if($ticket->status == 'NEW')
                               <span class="badge-warning pr-2 pl-2 pt-1 pb-1" style="border-radius: 10px">در انتظار پاسخ</span>
                             @elseif($ticket->status == 'ANSWERED')
                               <span class="badge-success pr-2 pl-2 pt-1 pb-1" style="border-radius: 10px">پاسخ داده شده</span>
                             @else
                               <span class="badge-danger pr-2 pl-2 pt-1 pb-1" style="border-radius: 10px">بسته شده</span>
                             @endif
                          </td>
                          <td style="vertical-align: middle;text-align: center">
                            <a href="{{url('panel/tickets/'.$ticket->id)}}" class="btn btn-success">خواندن</a>
                          </td>
                       </tr>
                   @endforeach
              </tbody>
            </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endSection
