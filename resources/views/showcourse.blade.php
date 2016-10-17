    @extends('master')

    @section('title', 'Student Profile')
    @section('content')
    <div class="content-area">

      <div class="float-button">
        <span>MENU</span>
      </div>

    <h1 class="heading">เลือกคอร์สที่จะสอน</h1><br>
@foreach($Courses as $Course)
      <a href="{{route('courseinfo', ['id' => $Course->id])}}">
      <div class="card-small-wrapper">
        <div class="card-small">
          <div class="date"><h1>25<br><span>Dec</span></h1></div>
          <div class="card-detail">
            <div class="card-name"><h1>{{$Course->subject}}<br><span>Condition...</span></h1></div>
            <div class="card-description"><h2 class="card-time">13:00 - 14:00</h2><br class="card-breaker"><h2 class="card-location">Siam Discovery</h2></div>
          </div>
        </div>
      </a>
@endforeach


      </div>




    </div>
    @endsection