<form action='' method='post'>
	วิชา<input type='text' name='subject'>
	เวลา<input type='text' name='time'>
	ราคา<input type='text' name='credit'>
	<input type='submit'>
	 {{ csrf_field() }}
</form>