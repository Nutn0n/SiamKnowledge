

	@foreach($data as $log)
		{{Sentinel::findById($log->user_id)->email}}
		{{$log->credit}}credit <a href='/admin/credit/approve/{{$log->id}}'>approve</a>
	@endforeach
