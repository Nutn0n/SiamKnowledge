Who interest in your Course<br>
@foreach($data['course']->interests as $interest)
id: {{$interest->user_id}}
{{$interest->user->email}}
<br>
@endforeach