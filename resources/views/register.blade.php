<form action='' method="post">
	<input type='text' name='email'>
	<input type='password' name='password'>
	{{ csrf_field() }}
	<input type='submit'>
</form>