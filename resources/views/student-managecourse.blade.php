@extends('student-master')
@section('content')
    <!-- Content Area -->
    <div class="content-area">
      <h1 class="heading">คอร์สที่เลือกเรียน</h1>


      <div class="card-large">
        <div class="card-divider">
          <div class="date"><h1>{{$data['course']->date}}<br><span>{{$data['course']->month}}</span></h1></div>
          <div class="card-detail">
            <div class="card-name"><h1>{{$data['course']->topic}}<br><span>{{$data['course']->subject}}</span></h1></div>
            <div class="card-description"><h2 class="card-time">13:00 - 14:00</h2><h2 class="card-location">{{$data['course']->place}}</h2></div>
          </div>
        </div>
        <p>{{$data['course']->objective}}</p>
      </div>

      <div class="card-small-wrapper"><br/><br/>
    <h2 class="large-topic">ติวเตอร์ที่ตอบรับ</h2>

      <!-- Start  loop -->
      @foreach($data['course']->interests as $interest)
      @if($interest->user->id = $data['course']->tutor_id)
		<br>
      <div class="card-small card-request-small">
      <div style="background-image: url('@if($interest->user->profile->avatar!=NULL) {{Storage::url($interest->user->profile->avatar)}}@else https://api.adorable.io/avatars/100/{{$interest->user->profile->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;" class="teacher-pic"></div>
        <div class="card-detail">
          <div class="card-name teacher-name"><h1>{{$interest->user->profile->name}}</h1></div>
          <div class="card-description">
            <h2 class="card-time">พี่{{$interest->user->profile->calledname}}</h2><br>
            <a href="{{route('tutorprofile', ['id'=>$data['course']->id,'tutorid'=>$interest->user_id])}}" class="button button-grey">ดูประวัติ</a>
          </div>
        </div>
      </div>
      <!-- end  loop -->
      @break
      @else
        <br>
      <div class="card-small card-request-small">
      <div style="background-image: url('@if($interest->user->profile->avatar!=NULL) {{Storage::url($interest->user->profile->avatar)}}@else https://api.adorable.io/avatars/100/{{$interest->user->profile->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;" class="teacher-pic"></div>
        <div class="card-detail">
          <div class="card-name teacher-name"><h1>{{$interest->user->profile->name}}</h1></div>
          <div class="card-description">
            <h2 class="card-time">พี่{{$interest->user->profile->calledname}}</h2><br>
            @if($data['available']==true)<a href="/viewmycourse/{{$data['course']->id}}/select/{{$interest->user_id}}" class="button button-orange">เลือกคนนี้</a>@endif
            <a href="{{route('tutorprofile', ['id'=>$data['course']->id,'tutorid'=>$interest->user_id])}}" class="button button-grey">ดูประวัติ</a>
          </div>
        </div>
      </div>
	   @endif

	@endforeach
    </div>

    </div>
  @endsection