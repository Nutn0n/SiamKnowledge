<!--- start loop -->
    @foreach($results as $result)
    <a href="{{route('updateprofileadmin', ['id'=>$result->id])}}">
            <div class="profile-item">
               <span class="profile-picture" style="background-image: url('@if($result->avatar!=NULL) {{Storage::url($result->avatar)}}@else https://api.adorable.io/avatars/100/{{$result->email}} @endif');background-size: cover;background-position: center;background-repeat: no-repeat;"></span>
              <span class="profile-text">
              <h2>{{$result->name}}</h2>
              <h3>{{$result->school}}</h3>
              </span>
            </div>
      </a>
    @endforeach
  <!--- end loop -->


         
          