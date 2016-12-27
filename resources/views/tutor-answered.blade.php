    @extends('tutor-master')

    @section('title', 'Student Profile')
    @section('content')
    <div class="content-area">

      <div class="float-button">
        <span>MENU</span>
      </div>

    <h1 class="heading">ได้รับการตอบรับแล้ว</h1><br>
    @if(count($Courses)!=0)
    @foreach($Courses as $Course)
          <a href="{{route('verify', ['id' => $Course->id])}}">
          <div class="card-small-wrapper">
            <div class="card-small">
              <div class="date"><h1>{{$Course->date}}<br><span>{{$Course->month}}</span></h1></div>
              <div class="card-detail">
                <div class="card-name"><h1>{{$Course->topic}}<br><span>{{$Course->subject}}</span></h1></div>
                <div class="card-description"><h2 class="card-time">{{$Course->timestring}}</h2><br class="card-breaker"><h2 class="card-location">{{$Course->place}}</h2></div>
              </div>
            </div>
          </a>
    @endforeach
    @else
    <div  class="null-card"><h1> <span class="ion-ios-albums-outline"></span> ไม่มีข้อมูลให้แสดง</h1></div>
    @endif

      </div>




    </div>
    @endsection