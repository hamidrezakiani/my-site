@extends('panel/master')

@section('ticket') active @endSection

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ارسال تیکت جدید</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{url('panel')}}">خانه</a></li>
              <li class="breadcrumb-item"><a href="{{url('panel/tickets')}}">تیکت ها</a></li>
              <li class="breadcrumb-item active">تیکت جدید</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row" style="padding: 25px">
            <form style="min-width: 100%;" action="{{url('panel/tickets')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="subject">موضوع</label>
                    <input class="form-control" name="subject" required id="subject">
                </div>
                <div class="form-group">
                    <label for="text">متن</label>
                    <textarea rows="8" class="form-control" required name="text" id="text"></textarea>
                </div>
              <div class="form-group">
                <label for="important">اولویت</label>
                <select class="form-control" name="important" id="important">
                    <option value="HIGH">بالا</option>
                    <option value="MIDDLE">متوسط</option>
                    <option value="LOW">پایین</option>
                </select>
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
