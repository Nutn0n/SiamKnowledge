
  @foreach($data['profile'] as $profile)
  @foreach($profile->user->course as $course)
            <div class="profile-item">
              <span class="profile-text course-info-list">
              <h2>{{$profile->name}}</h2>
              </span>
              <span class="profile-subject course-info-list">
              <h2>{{$course->topic}}</h2>
              </span>
              <span class="profile-date course-info-list">
              <h2>{{$course->startdate}}</h2>
              </span>
              <span class="profile-date course-info-list">
              <h2>{{$course->length}} ชั่วโมง</h2>
              </span>
              <span class="profile-more-info course-info-list">
              @if($course->cancel == 1)
              <h3 class="status status-red">ถูกยกเลิก</h3>
              @elseif ($course->verified == 1 && $course->cancel == 0 && $course->available == 0)
              <h3 class="status status-green">เสร็จสิ้น</h3>
              @else
              <h3 class="status status-normal">รอการตอบรับ</h3>
              @endif
              </span>
            </div>
  @endforeach
  @endforeach


  @foreach($data['course'] as $course)
            <div class="profile-item">
              <span class="profile-text course-info-list">
              <h2>{{$course->user->profile->name}}</h2>
              </span>
              <span class="profile-subject course-info-list">
              <h2>{{$course->topic}}</h2>
              </span>
              <span class="profile-date course-info-list">
              <h2>{{$course->startdate}}</h2>
              </span>
              <span class="profile-date course-info-list">
              <h2>{{$course->length}} ชั่วโมง</h2>
              </span>
              <span class="profile-more-info course-info-list">
              @if($course->cancel == 1)
              <h3 class="status status-red">ถูกยกเลิก</h3>
              @elseif ($course->verified == 1 && $course->cancel == 0 && $course->available == 0)
              <h3 class="status status-green">เสร็จสิ้น</h3>
              @else
              <h3 class="status status-normal">รอการตอบรับ</h3>
              @endif
              </span>
            </div>
  @endforeach
