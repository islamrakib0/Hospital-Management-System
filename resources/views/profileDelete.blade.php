@extends('layouts.app')

@section('content')
@if (auth()->user()->role !='admin')
<div class="col-md-6 offset-3">
	<div class="alert  alert-primary text-center">
		<b>Warning:</b> After delete you'll never be able to retrive your information again.<br>
		Are you sure, you want to delete account?
		<form method="post">
			@method('delete')
			@csrf
			<br>
			<button class="btn btn-danger">Yes</button> <a href="/profile" class="btn btn-dark">No</a>
		</form>
	</div>
</div>
@else
<div class="col-md-6 offset-3">
	<div class="alert  alert-primary text-center">
		<b>Warning:</b> You are an admin, you cannot delete your account!
		<br>
		<a href="/profile" class="btn btn-dark">Ok</a>
	</div>
</div>
@endif
@endsection