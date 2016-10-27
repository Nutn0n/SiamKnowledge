@extends('tutor-master')
@section('content')
    <div class="content-area">
      <h1 class="heading">ได้รับการตอบรับแล้ว</h1>
      <div class="card-large">
        <div class="card-divider">
          <div class="date"><h1>25<br><span>Dec</span></h1></div>
          <div class="card-detail">
            <div class="card-name"><h1>{{$Course->topic}}<br><span>{{$Course->subject}}</span></h1></div>
            <div class="card-description"><h2 class="card-time">{{$Course->timestring}}</h2><h2 class="card-location">{{$Course->place}}</h2></div>
          </div>
        </div>
        <p>{{$Course->objective}}</p>
        <div class="card-divider">
          <div class="teacher-pic"></div>
          <div class="card-detail">
            <div class="card-name student-name"><h1>{{$Course->user->profile->name}}<br><span>{{$Course->user->profile->calledname}}</span></h1></div>
            <div class="card-description student-description"><h2 class="card-school">{{$Course->user->profile->school}}</h2><br><h2 class="card-time">{{$Course->user->profile->phone}}</h2></div>
          </div>
        </div>
      </div>
      @if($Course->verified==false)
      <div class="sub-menu-button-wrapper">
        <a href="#" id='verify' class="button button-orange">ยินยันการสอน{{session('status')}}</a>
        <a href="#" class="button button-red">ไม่มีการสอน</a>
      </div>
      @endif
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
      window.location = "{{route('welcome')}}" + "/verify/" + "{{$Course->id}}/" + inputValue ;
    });

  });
  </script>
@if(Session::has('status'))
    @if((session('status')==true))
      <script type="text/javascript">swal('ยืนยันเรียบร้อย', 'ได้แอดเครดิตเข้าสู่ระบบแล้ว', 'success');</script>
    @elseif(session('status')==false) && session('status')!=NULL)
      <script type="text/javascript">swal('รหัสไม่ถูกต้อง', 'กรุณากรอกรหัสใหม่อีกครั้ง');</script>
    @endif
@endif
@endsection