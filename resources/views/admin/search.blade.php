<!--- start loop -->
    @foreach($results as $result)
            <div class="profile-item">
              <span class="profile-picture" style=""></span>
              <span class="profile-text">
              <h2>{{$result->name}}</h2>
              <h3>{{$result->school}}</h3>
              </span>
            </div>
    @endforeach
  <!--- end loop -->