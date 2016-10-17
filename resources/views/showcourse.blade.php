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
          <div class="date"><h1>{{$Course->date}}<br><span>{{$Course->month}}</span></h1></div>
          <div class="card-detail">
            <div class="card-name"><h1>{{$Course->topic}}<br><span>{{$Course->subject}}</span></h1></div>
            <div class="card-description"><h2 class="card-time">{{$Course->time}}</h2><br class="card-breaker"><h2 class="card-location">{{$Course->place}}</h2></div>
          </div>
        </div>
      </a>
@endforeach


      </div>




    </div>
    @endsection