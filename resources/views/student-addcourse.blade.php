@extends('student-master')
@section('content')
<link rel='stylesheet' href='/assets/css/default.css'>
<link rel='stylesheet' href='/assets/css/default.time.css'>
    <!-- Content Area -->
    <form action='' method='post'>
    <div class="content-area">
      <h1 class="heading">จองเรียน</h1><br>
      <select name='topic' class="dropdown-orange">
        <option value="" disabled selected hidden>เลือกวิชา</option>
        <option>ภาษาอังกฤษ</option>
        <option>เลข</option>
        <option>ฟิสิกส์</option>
        <option>เคมี</option>
        <option>ชีวะ</option>
      </select>
      <h2 class="topic">หัวข้อที่ต้องการเรียน</h2>
      <input type="text" name='subject' class="normal-input">
      <ul class="select">
        <li class="selection">
          <input name='inter' value='yes-inter' type="radio" id="a-option" checked>
          <label for="a-option"><span class="ion-ios-world-outline"></span>อินเตอร์</label>
        </li>
        <li class="selection">
          <input name='inter' value='no-inter' type="radio" id="b-option">
          <label for="b-option"><span class="ion-ios-chatbubble-outline"></span>ธรรมดา</label>
        </li>
      </ul>
      <h2 class="topic">วัตถุประสงค์</h2>
      <textarea name='objective' class="text-input" placeholder="Placeholder Text"></textarea>
      <ul class="select">
        <li class="selection">
          <input name='group' value='individual' type="radio" id="a-option" checked="checked">
          <label for="a-option">แบบเดี่ยว</label>
        </li>
        <li class="selection">
          <input name='group' value='yes-group' type="radio" id="b-option">
          <label for="b-option">แบบกลุ่ม</label>
        </li>
      </ul>
      <h2 class="topic">เลือกวันที่</h2>
      <div id="datepicker"></div><br/>
      <h2 class="topic">เลือกเวลา</h2>
      <input class="timepicker normal-input" type="time" name="time" autofocuss></input>
    <input type="text" id='datepickervalue' hidden name="date" />
      <h2 class="topic">จำนวนชั่วโมง</h2>
      <select name='length' class="dropdown-orange">
        <option value="" disabled selected hidden>เลือกชั่วโมง</option>
        <option value=2>2 ชั่วโมง</option>
        <option value=2.5>2 ชั่วโมง 30 นาที</option>
        <option value=3>3 ชั่วโมง</option>
        <option value=3.5>3 ชั่วโมง 30 นาที</option>
        <option value=4>4 ชั่วโมง</option>
        <option value=4.5>4 ชั่วโมง 30 นาที</option>
        <option value=5>5 ชั่วโมง</option>
      </select>
      <h2 class="topic">ระดับชั้น</h2>
      <select name='grade' class="dropdown-orange">
        <option value="" disabled selected hidden>เลือกระดับชั้น</option>
        <option value='kindergarten'>อนุบาล</option>
        <option value='elementary'>ประถม</option>
        <option value='1secondary'>มัฐยมต้น</option>
        <option value='2secondary'>มัฐยมปลาย</option>
        <option value='university'>มหาวิทยาลัย</option>
      </select>
      <h2 class="topic">ใส่สถานที่</h2>
    <input type="text" name='place' class="normal-input">

      <br/>      <br/>      <br/>      <br/>
      {{ csrf_field() }}
      <button type='submit' class="button button-orange">เพิ่มคอร์ส</button>

    </div>
</form>

@endsection

@section('postscript')
    <script src='/assets/js/picker.js' type='text/javascript'></script>
    <script src='/assets/js/picker.time.js' type='text/javascript'></script>
    <script>
    @if(count($errors)!=0)
      swal("มีข้อผิดพลาด!", "กรุณาตรวจสอบข้อมูลอีกครั้ง")
    @endif
      $(document).ready(function(){
        $( "#datepicker" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
      })
    $("#datepicker").datepicker({
      onSelect: function(dateText) {
        $("#datepickervalue").val(dateText);
      }
    });

        var $input = $( '.timepicker' ).pickatime({
        });
        
    </script>
@endsection