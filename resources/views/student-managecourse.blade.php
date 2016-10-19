Who interest in your Course<br>
@foreach($data['course']->interests as $interest)
id: {{$interest->user_id}}
{{$interest->user->email}}
@if($data['course']->available == 1)
<a href="/viewmycourse/{{$data['course']->id}}/select/{{$interest->user_id}}">select</a>
@endif
<br>
@endforeach