@extends('student-master')
@section('content')
<div class="content-area">
	<h1 class="heading">ส่วนสนับสนุนผู้ใช้</h1><br>
	<form method="post" action=''>
		<h1 class="framework-topic">หัวข้อ</h1>
		<input type="text" class="normal-input">
		<h1 class="framework-topic" >คอร์สที่เรียน</h1>
		<input type="text" disabled value={{$data["coursesubject"]}} class="normal-input">
		<h1 class="framework-topic">ปัญหาการใช้งาน</h1>
		<textarea class="text-input" placeholder="ควย แม่ง สอนกุไม่รู้เรื่องไอสัส"></textarea>
		<button class="button button-orange" type='submit'>Submit</button>
	</form>
</div>
@endsection