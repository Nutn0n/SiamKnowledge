@extends('student-master')
@section('content')
    <div class="content-area">
      <h1 class="heading">คอร์สที่เลือกเรียน</h1>
      <h2 class="large-topic">ติวเตอร์ที่ตอบรับ</h2>

      <div class="card-large card-request">
        <div class="card-request-divider">
          <div class="teacher-pic"></div>
          <div class="card-detail">
            <div class="card-name teacher-name"><h1>{{$data['profile']->name}}</h1></div>
            <div class="card-description"><h2 class="card-time">{{$data['profile']->calledname}}</h2></div>
          </div>
        </div>
        <h2 class="large-topic teacher-skills"><span class="ion-person"></span> นายทิม คุก (พี่ทิม)</h2>
        <h2 class="large-topic teacher-skills"><span class="ion-university"></span> {{$data['profile']->university}}</h2>
        <h2 class="large-topic teacher-skills"><span class="ion-ios-chatboxes"></span> ประสบการสอน 6 ปี</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus pellentesque nunc, vel vestibulum metus bibendum consequat. Donec congue ex sit amet dui vehicula vehicula. Etiam quis metus lectus.</p>
        @if($data['available']==true)<a href="{{route('selecttutor', ['id'=>$data['id'], 'tutorid'=>$data['tutorid']])}}" class="button button-orange">เลือกคนนี้</a>@endif
        <a href="{{url()->previous()}}" class="button button-grey">ย้อนกลับ</a>
      </div>
@endsection