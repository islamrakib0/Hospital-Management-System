@extends('layouts.app')

@section('content')
@if (session('success'))
<div class=" col-md-12">
	<div class="alert  alert-success alert-dismissible fade show" role="alert">
		{{ session('success') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>
@endif
@if (session('fail'))
<div class=" col-md-12">
	<div class="alert  alert-danger alert-dismissible fade show" role="alert">
		{{ session('fail') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>
@endif
<div class="col-md-12">
	<div class="card card-user">
		<div class="card-header">
			<h5 class="card-title">Create Test</h5>
		</div>
		<div class="card-body">
			<form method="post">
				@csrf
				<div class="row">
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Test Name</label>
							<input type="text" name="name" placeholder="Test Name" class="form-control" value="{{$test->name}}">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Cost</label>
							<input type="text" name="cost" placeholder="Cost" class="form-control" value="{{$test->cost}}">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Duration</label>
							<select name="duration" class="custom-select my-1 mr-sm-2">
								<option>{{$test->duration}}</option>
								<option>6 Hours</option>
								<option>12 Hours</option>
								<option>1 Day</option>
								<option>2 Days</option>
								<option>3 Days</option>
								<option>4 Days</option>
								<option>5 Days</option>
								<option>6 Days</option>
								<option>7 Days</option>
							</select>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Sample Required</label>
							<input type="text" name="sample" placeholder="Sample Name with (,)" class="form-control" value="{{$test->sample}}">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Description">{{$test->description}}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="update ml-auto mr-auto">
						<button class="btn btn-primary btn-round">Update Test</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection