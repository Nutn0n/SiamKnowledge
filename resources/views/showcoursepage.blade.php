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
        <div class="date"><h1>25<br><span>Dec</span></h1></div>
        <div class="card-detail">
          <div class="card-name"><h1>{{$data['Course']->subject}}e<br><span>Condition...</span></h1></div>
          <div class="card-description"><h2 class="card-time">13:00 - 14:00</h2><h2 class="card-location">Siam Discovery</h2></div>
        </div>
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus pellentesque nunc, vel vestibulum metus bibendum consequat. Donec congue ex sit amet dui vehicula vehicula. Etiam quis metus lectus. Sed quis sagittis nunc, et ullamcorper dolor. Sed non purus tempus, feugiat lacus at, tincidunt felis. Fusce viverra sem ipsum, ac ultrices odio elementum at. Sed quis luctus tortor. Integer varius pellentesque laoreet. Curabitur urna lectus, condimentum eget lectus pellentesque, bibendum rhoncus diam.</p>
      </div>
      @if($data['tutor'])
        @if($data['haveinterest']==false)
        <a href="/course/{{$data['Course']->id}}/interest" class="button button-orange">เลือก</a>
        @else
        คุณได้ให้ความสนใจที่จะสอนคอร์เรียนนี้ <br><a href="/course/{{$data['Course']->id}}/uninterest" class="button button-orange">เลิกให้ความสนใจ</a>
        @endif
      @endif
      <a href="#" class="button button-grey">กลับ</a>

    </div>
      </div>




    </div>
  @endsection