@foreach($data['course'] as $Course)
	@if($Course->available == 1)
	{{$Course->id}}
	{{$Course->subject}}
	<a href='/viewmycourse/{{$Course->id}}'>Manage</a>
	<br>
	@endif
@endforeach