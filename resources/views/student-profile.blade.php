    @extends('student-master')

    @section('title', 'Student Profile')
    @section('content')
    <div class="content-area">
    <form action='' method='post' enctype="multipart/form-data">
      <h1 class="heading">ข้อมูลของฉัน</h1><br>
      <h2 class="large-topic">ชื่อ - นามสกุล</h2>
      <input type="text" class="large-normal-input normal-input" name='name' value='{{$profile->name}}'>
      <h2 class="large-topic">ชื่อเล่น</h2>
      <input type="text" class="normal-input" name='calledname' value='{{$profile->calledname}}'>
      <h2 class="large-topic">อายุ</h2>
      <input type="number" class="number-spin-input" name='birthdate' value='{{$profile->birthdate}}'>
      <h2 class="large-topic">โรงเรียน</h2>
      <input type="text" class="large-normal-input normal-input" name='school' value='{{$profile->school}}'>
      <h1 class="sub-heading">ข้อมูลติดต่อ</h1><br>
      <h2 class="large-topic">E-mail</h2>
      <input type="text" class="normal-input" name='email' value='{{$profile->email}}'>
      <h2 class="large-topic">โทรศัพท์มือถือ</h2>
      <input type="text" class="normal-input" name='phone' value='{{$profile->phone}}'>
      <h2 class="large-topic">อัพโหลดภาพประจำตัวใหม่</h2>
      @if(count($errors->get('avatar')) > 0)<br><span class="ion-ios-minus-outline"></span>ไฟล์ไม่ใช่รูปภาพหรือมีขนาดเกิน 2mb</span></h3>@endif
      <!--<input type="file" class="normal-input" name='avatar'>-->

      <div class="file-drop-area">
  <span class="fake-btn">Choose files</span>
  <span class="file-msg js-set-number">or drag and drop files here</span>
  <input class="file-input" type="file" name="avatar">
  </div>

  <style>
  var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
  $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
  $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev('.js-set-number');

  if (filesCount === 1) {
    // if single file then show file name
    $textContainer.text($(this).val().split('\\').pop());
  } else {
    // otherwise show number of files
    $textContainer.text(filesCount + ' files selected');
  }
});
  </style>

      <br/>      <br/>
      <input type="hidden" name="_method" value="PUT">
      {{ csrf_field() }}
   <button type='submit' class="button button-orange">บันทึกการแก้ไข</button>
   </form>
    </div>
    @endsection
@section('postscript')
  @if(count($errors->all())>0)
    <script type="text/javascript">swal('มีข้อผิดพลาด กรุณาตรวจสอบข้อมูลอีกครั้ง');</script>
  @endif
@endsection
