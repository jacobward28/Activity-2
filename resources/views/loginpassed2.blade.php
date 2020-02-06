@extends ('layouts.appmaster')
@section('title', 'Login Passed Page')

@section('content')
	@if($model->getUsername() == 'Jacob')
		<h3>Jacob you have logged in succesfully</h3>
	@else
		<h3>Someone besides Jacob logged in succesfully</h3>
	@endif
	<br>
	<a href="login2">Login Again</a>
@endsection