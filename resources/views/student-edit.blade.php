@extends('student-master')
@section('content')
<div class="content-area">
<form action='' method='post'>
<input type='text' name='subject' value="{{$Course->subject}}"><br>
<input type='text' name='objective' value="{{$Course->objective}}"><br>
<input type='text' name='startdate' value="{{$Course->startdate}}"><br>
<input type='text' name='place' value="{{$Course->place}}"><br>
<input type='text' name='length' value="{{$Course->length}}"><br>
<input type='text' name='time' value="{{$Course->time}}"><br>
{{ csrf_field() }}
<input type='submit'>
</form>
</div>
@endsection