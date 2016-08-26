@extends('master')
@foreach($Courses as $Course)
	<a href='/course/{{$Course->id}}'>{{$Course->subject}}</a><br> 
@endforeach