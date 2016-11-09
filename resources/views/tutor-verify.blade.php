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
          <div class="teacher-pic" style="background-image: url('@if($Course->user->profile->avatar!=NULL) {{Storage::url($Course->user->profile->avatar)}}@else https://api.adorable.io/avatars/100/{{$Course->user->profile->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;"></div>
          <div class="card-detail">
            <div class="card-name student-name"><h1>{{$Course->user->profile->name}}<br><span>{{$Course->user->profile->calledname}}</span></h1></div>
            <div class="card-description student-description"><h2 class="card-school">{{$Course->user->profile->school}}</h2><br><h2 class="card-time">{{$Course->user->profile->phone}}</h2></div>
          </div>
        </div>
      </div>
      @if($Course->verified==false)
      <div class="sub-menu-button-wrapper">
        <a href="#" id='verify' class="button button-orange">ยินยันการสอน{{session('status')}}</a>
        <a href="#" id='cancel' class="button button-red">ไม่มีการสอน</a>
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
        swal.showInputError("คุณต้องกรอกรหัสยืนยัน 6 ต่ำแหน่ง");
        return false
      }
      window.location = "{{route('welcome')}}" + "/verify/" + "{{$Course->id}}/" + inputValue ;
    });

  });

  $('#cancel').click(function(){
   swal({   title: "ไม่มีการสอนเกิดขึ้นจริง?",   text: "หากกด ใช่ จะไม่สามารถย้อนกลับได้",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "ไม่มีการสอน",   closeOnConfirm: false }, function(){
    window.location = "{{route('welcome')}}" + "/cancel/" + "{{$Course->id}}/";
    

  });
  });


  </script>
@if(Session::has('status'))
    @if((session('status')==true))
      <script type="text/javascript">swal('ยืนยันเรียบร้อย', 'ได้แอดเครดิตเข้าสู่ระบบแล้ว', 'success');</script>
    @elseif(session('status')==false) && session('status')!=NULL)
      <script type="text/javascript">swal('รหัสไม่ถูกต้อง', 'กรุณากรอกรหัสใหม่อีกครั้ง');</script>
      @elseif(session('cancel')==true) && session('cancel')!=NULL)
      <script type="text/javascript">swal("บันทึกเรียบร้อย", "คอร์สนี้ไม่เคยเกิดขึ้นจริง", "success"); </script>
    @endif
@endif
@endsection