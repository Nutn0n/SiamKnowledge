@extends('student-master')
@section('content')
<link rel='stylesheet' href='/assets/css/default.css'>
<link rel='stylesheet' href='/assets/css/default.time.css'>
<div class="content-area">
<form action='' method='post'>
<h2 class="large-topic">หัวข้อ</h2>
<input type='text' class="large-normal-input normal-input" name='subject' value="{{$Course->subject}}"><br>
<h2 class="large-topic">จุดประสงค์</h2>
<input type='text' class="large-normal-input normal-input" name='objective' value="{{$Course->objective}}"><br>
<h2 class="large-topic">วันที่</h2>
<div id="datepicker"></div><br/>
<input type='text' id='datepickervalue' name='startdate' hidden value="{{$Course->startdate}}">
<h2 class="large-topic">ระยะเวลา</h2>
<select name='length' class="dropdown-orange">
  <option value="" disabled hidden>เลือกชั่วโมง</option>
  <option value=2 @if($Course->length==2) selected @endif>2 ชั่วโมง</option>
  <option value=2.5 @if($Course->length==2.5) selected @endif>2 ชั่วโมง 30 นาที</option>
  <option value=3 @if($Course->length==3) selected @endif>3 ชั่วโมง</option>
  <option value=3.5 @if($Course->length==3.5) selected @endif>3 ชั่วโมง 30 นาที</option>
  <option value=4 @if($Course->length==4) selected @endif>4 ชั่วโมง</option>
  <option value=4.5 @if($Course->length==4.5) selected @endif>4 ชั่วโมง 30 นาที</option>
  <option value=5 @if($Course->length==6) selected @endif>5 ชั่วโมง</option>
</select>
      <br>
<h2 class="large-topic">เวลา</h2>
<input type='text' class="large-normal-input normal-input timepicker" type="time" name='time' autofocuss value="{{$Course->time}}"><br>
<h2 class="large-topic">สถานที่</h2>
<input type='text' class="large-normal-input normal-input" name='place' value="{{$Course->place}}"><br>
{{ csrf_field() }}
<button type='submit' class="button button-orange">บันทึกการแก้ไข</button>
</form>
</div>
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
        $("#datepicker").datepicker( "setDate" , "{{$Course->startdate}}" );
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