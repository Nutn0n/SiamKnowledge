@extends('master')
@section('title', 'Choose Course')
@section('content')
    <div class="content-area">

      <div class="float-button">
        <span>MENU</span>
      </div>

    <h1 class="heading">เลือกคอร์สที่จะสอน</h1><br>
    <div class="card-large">
      <div class="card-divider">
        <div class="date"><h1>{{$data['Course']->date}}<br><span>{{$data['Course']->month}}</span></h1></div>
        <div class="card-detail">
          <div class="card-name"><h1>{{$data['Course']->subject}}<br><span>Condition...</span></h1></div>
          <div class="card-description"><h2 class="card-time">{{$data['Course']->time}}</h2><h2 class="card-location">{{$data['Course']->place}}</h2></div>
        </div>
      </div>
      <p>{{$data['Course']->objective}}</p>
      </div>
      @if($data['tutor'])
        @if($data['haveinterest']==false)
        <a href="/course/{{$data['Course']->id}}/interest" class="button button-orange">เลือก</a>
        @else
        คุณได้ให้ความสนใจที่จะสอนคอร์เรียนนี้ <br><a href="/course/{{$data['Course']->id}}/uninterest" class="button button-orange">เลิกให้ความสนใจ</a>
        @endif
      @endif
      <a href="{{route('course')}}" class="button button-grey">กลับ</a>

    </div>
      </div>




    </div>
  @endsection