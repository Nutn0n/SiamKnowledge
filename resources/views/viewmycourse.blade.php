@foreach($data['course'] as $Course)
	{{$Course->id}}
	{{$Course->subject}}
	<a href='/viewmycourse/{{$Course->id}}'>Manage</a>
	<br>
@endforeach