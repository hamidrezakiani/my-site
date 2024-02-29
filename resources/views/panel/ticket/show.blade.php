@extends('panel/master')

@section('ticket') active @endSection
@section('css')
  <style>
    #triangle-right::before{
        content: '';
        width: 0;
	    height: 0;
        right: -5px;
        top: 0px;
        line-height: 0;
        position: absolute;
	border-left: 14px solid #17a2b8;
	border-bottom: 15px solid transparent;
    }

    #triangle-left::before{
        content: '';
        width: 0;
	    height: 0;
        left: -5px;
        top: 0px;
        line-height: 0;
        position: absolute;
	border-right: 14px solid #ddd;
	border-bottom: 15px solid transparent;
    }
  </style>
@endsection
@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مکالمه</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('panel')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('panel/tickets')}}">تیکت ها</a></li>
              <li class="breadcrumb-item active">مکالمه</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <p><h4 class="m-3">موضوع : <span class="badge-warning" style="font-size: 14px;padding: 5px 10px;border-radius: 10px">{{$ticket->subject}}</span></h4>
                <h4 class="m-3">اولویت : @switch($ticket->important)
                @case('LOW')
                    <span style="font-size: 14px;padding: 5px 10px;border-radius: 10px" class="badge-secondary">پایین</span>
                    @break
                @case('MIDDLE')
                      <span style="font-size: 14px;padding: 5px 10px;border-radius: 10px" class="badge-warning">متوسط</span>
                    @break
                @default
                   <span style="font-size: 14px;padding: 5px 10px;border-radius: 10px" class="badge-success">بالا</span>
            @endswitch</h4>
            <h4 class="m-3">وضعیت : @switch($ticket->status)
                @case('NEW')
                    <span style="font-size: 14px;padding: 5px 10px;border-radius: 10px" class="badge-warning">در انتظار پاسخ</span>
                    @break
                @case('ANSWERED')
                      <span style="font-size: 14px;padding: 5px 10px;border-radius: 10px" class="badge-success">پاسخ داده شده</span>
                    @break
                @default
                   <span style="font-size: 14px;padding: 5px 10px;border-radius: 10px" class="badge-danger">بسته شده</span>
            @endswitch</h4>
        </p>
        </div>
        <div class="row">
            <div class="col-xl-2 col-lg-1 col-md-1 col-sm-0"></div>
            <div class="col-xl-8 col-lg-10 col-md-10 col-sm-12">
                <div style="display: flex;justify-content: left">
                <h6 style="margin-right: 200px !important">
                {{verta($ticket->created_at)->format('h:i Y-m-d')}}
            </h6>
             </div>
                <div class="bg-white" style="padding: 8px">
                    @foreach ($ticket->messages as $message)
                @if($message->user_id == Auth::user()->id)
                   <div class="col-12"  style="margin-bottom: 10px">

                      <div class="badge-info" id="triangle-right" style="min-width: 30%;max-width: 85%;width: fit-content;text-align: right;padding:5px 12px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;border-bottom-right-radius: 8px">
                        <div style="display: flex;width: 100%;justify-content: left">
                           <span style="font-size: 11px">{{verta($message->created_at)->format('h:i Y-m-d')}}</span>
                        </div>
                        {{$message->text}}
                        <br>
                        @if($message->file)
                          <a href="{{asset($message->file)}}" style="font-size: 14px;color: #000">فایل شما</a>
                        @endif
                    </div>
                   </div>
                @else
                   <div class="col-12" style="direction: ltr;margin-bottom: 10px">
                      <div id="triangle-left" style="background-color:#ddd;min-width: 30%; max-width: 85%;width: fit-content;text-align: right;padding:5px 12px;border-top-right-radius: 8px;border-bottom-left-radius: 8px;border-bottom-right-radius: 8px">
                        <div style="display: flex;width: 100%;justify-content: right">
                           <span style="font-size: 11px">{{verta($message->created_at)->format('Y-m-d h:i')}}</span>
                        </div>
                        {{$message->text}}
                        <br>
                        @if($message->file)
                        <a href="{{asset($message->file)}}" style="font-size: 14px;">دانلود فایل</a>
                        @endif
                      </div>
                   </div>
                @endif
            @endforeach
                </div>
            </div>
            <div class="col-xl-2 col-lg-1 col-md-1 col-sm-0"></div>
        </div>
        @if($ticket->status == 'ANSWERED')
            <div class="row" style="padding: 25px">
            <form style="min-width: 100%;" action="{{url('panel/tickets/message/'.$ticket->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="text">متن</label>
                    <textarea rows="8" class="form-control" required name="text" id="text"></textarea>
                </div>
              <div class="form-group">
                 <a class="btn btn-secondary mt-3" id="select-image-btn">افزودن فایل</a>
                  <br>
                 <span class="text-success" id="file-name"></span>
                 <input onchange="readURL(this);" accept="image/*" style="display: none;" class="form-control" type="file" name="file" id="image">
              </div>
              <div class="form-group" style="text-align: center">
                <button type="submit" class="btn btn-success">ارسال</button>
              </div>
            </form>
        </div>
        @endif
        @if($errors->has('message') && $errors->first('message') == 'SUCCESS')
           <div class="row" style="justify-content: center">
              <label class="text-success">تیکت با موفقیت ارسال شد.</label>
           </div>
        @endif
      </div>
    </section>
@endSection

@section('js')
  <script>
    $('#select-image-btn').on('click',function(){
        $('#image').click();
    });
    function readURL(input) {
  if (input.files && input.files[0]) {
    var fullPath = document.getElementById('image').value;
    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
    var filename = fullPath.substring(startIndex);
    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        filename = filename.substring(1);
    }
    console.log(filename);
    $('#file-name').html(filename);
  }
}
</script>
@endSection
