<form action='' method='post'>
<input type='text' name='credit'>
{{ csrf_field() }}
<input type='submit'>
</form>
<form action='/confirmcredit' method="post">
<input type='submit'>
{{ csrf_field() }}
</form>