@extends('master')

@section('content')
{{$data['Course']->id}}
{{$data['Course']->subject}}
{{$data['Course']->price}}
@if($data['tutor'])
	<a href='/course/{{$data['Course']->id}}/interest'>Interest</a>
@endif
@endsection