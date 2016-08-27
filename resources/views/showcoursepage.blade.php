@extends('master')

@section('content')
{{$data['Course']->id}}
{{$data['Course']->subject}}
{{$data['Course']->price}}
@if($data['tutor'])
	@if($data['haveinterest']==false)
	<a href='/course/{{$data['Course']->id}}/interest'>Interest</a>
	@else
	you have interested <a href='/course/{{$data['Course']->id}}/uninterest'>Uninterest</a>
	@endif
@endif
@endsection