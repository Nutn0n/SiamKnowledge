Who interest in your Course<br>
@foreach($data['course']->interests as $interest)
@if($interest->tutor_id == NULL)
id: {{$interest->user_id}}
{{$interest->user->email}}
@if($data['haveinterest']==false)
<a href="/viewmycourse/{{$data['course']->id}}/select/{{$interest->user_id}}">select</a>
@endif
<br>
@endif
@endforeach