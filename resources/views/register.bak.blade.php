@extends('master')
<form action='' method="post">
	<input type='text' name='email'>
	<input type='text' name='firstname'>
	<input type='text' name='lastname'>
	<input type='text' name='grade'>
	<input type='text' name='school'>
	<input type='password' name='password'>
	{{ csrf_field() }}
	<input type='submit'>
</form>