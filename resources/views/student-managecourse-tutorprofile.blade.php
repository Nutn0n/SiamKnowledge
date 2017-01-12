@extends('student-master')
@section('content')
    <div class="content-area">
      <h1 class="heading">คอร์สที่เลือกเรียน</h1>
      <h2 class="large-topic">ติวเตอร์ที่ตอบรับ</h2>

      <div class="card-large card-request">
        <div class="card-request-divider">
          <div style="background-image: url('@if($data['profile']->avatar!=NULL) {{Storage::url($data['profile']->avatar)}}@else https://api.adorable.io/avatars/100/{{$data['profile']->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;" class="teacher-pic"></div>

          <div class="card-detail">
            <div class="card-name teacher-name"><h1>{{$data['profile']->name}}</h1></div>
            <div class="card-description"><h2 class="card-time">{{$data['profile']->calledname}}</h2></div>
          </div>
        </div>
        <h2 class="large-topic teacher-skills"><span class="ion-person"></span> {{$data['profile']->name}} ({{$data['profile']->calledname}})</h2>
        <h2 class="large-topic teacher-skills"><span class="ion-university"></span> {{$data['profile']->university}}</h2>
        <h2 class="large-topic teacher-skills"><span class="ion-ios-chatboxes"></span> ประสบการณ์สอน {{$data['profile']->teachhours}} ชั่วโมง</h2>
        <p>{{$data['profile']->bio}}</p>
        @if($data['available']==true)<a href="{{route('selecttutor', ['id'=>$data['id'], 'tutorid'=>$data['tutorid']])}}" class="button button-orange">เลือกคนนี้</a>@endif
        <a href="{{url()->previous()}}" class="button button-grey">ย้อนกลับ</a>
      </div>
@endsection

@section('postscript')
  @if(session('status'))
      <script type="text/javascript">swal('เครดิตไม่เพียงพอ', 'กรุณาเติมเครดิต');</script>
  @endif
@endsection