@extends('tutor-master')
@section('content')
    <div class="content-area">
      <h1 class="heading">ได้รับการตอบรับแล้ว</h1>
      <h2 class="result">แสดงทั้งหมด <span class="bold-orange">3 รายการ</span></h2>
      <div class="card-large">
        <div class="card-divider">
          <div class="date"><h1>25<br><span>Dec</span></h1></div>
          <div class="card-detail">
            <div class="card-name"><h1>Subject Name<br><span>Condition...</span></h1></div>
            <div class="card-description"><h2 class="card-time">13:00 - 14:00</h2><h2 class="card-location">Siam Discovery</h2></div>
          </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus pellentesque nunc, vel vestibulum metus bibendum consequat. Donec congue ex sit amet dui vehicula vehicula. Etiam quis metus lectus. Sed quis sagittis nunc, et ullamcorper dolor. Sed non purus tempus, feugiat lacus at, tincidunt felis. Fusce viverra sem ipsum, ac ultrices odio elementum at. Sed quis luctus tortor. Integer varius pellentesque laoreet. Curabitur urna lectus, condimentum eget lectus pellentesque, bibendum rhoncus diam.</p>
        <div class="card-divider">
          <div class="teacher-pic"></div>
          <div class="card-detail">
            <div class="card-name student-name"><h1>Subject Name<span>Condition...</span></h1></div>
            <div class="card-description student-description"><h2 class="card-school">Blah Blah Blah</h2><br><h2 class="card-time">081-999-9999</h2></div>
          </div>
        </div>
      </div>
      <div class="sub-menu-button-wrapper">
        <a href="#" id='verify' class="button button-orange">ยินยันการสอน</a>
        <a href="#" class="button button-red">ไม่มีการสอน</a>
      </div>
    </div>
@endsection

@section('postscript')
<script type="text/javascript">
  $('#verify').click(function(){
    swal({
      title: "ยืนยันการสอน",
      text: "กรุณากรอกรหัสยืนยันการสอนที่ได้รับจากนักเรียน:",
      type: "input",
      showCancelButton: true,
      closeOnConfirm: false,
      animation: "slide-from-top",
      inputPlaceholder: "รหัสยืนยันการสอน 6 ต่ำแหน่งจากนักเรียน"
    },
    function(inputValue){
      if (inputValue === false) return false;
      
      if (inputValue === "") {
        swal.showInputError("You need to write something!");
        return false
      }
      
      swal("Nice!", "You wrote: " + inputValue, "success");
    });

  });
  </script>
@endsection