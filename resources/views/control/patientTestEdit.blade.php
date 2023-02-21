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
			<h5 class="card-title">Edit Patient Test</h5>
		</div>
		<div class="card-body">
			<form method="post">
				@csrf
				<div class="row">
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient</label>
							<select name="patient" class="custom-select my-1 mr-sm-2">
								<option value="{{$patientTest->patient}}">{{App\User::find($patientTest->patient)->name}} (Selected)</option>
								@foreach (App\User::where('role', 'patient')->get() as $patient)
								<option value="{{$patient->id}}">{{$patient->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Test</label>
							<select name="test" class="custom-select my-1 mr-sm-2">
								<option value="{{$patientTest->test}}">{{App\Test::find($patientTest->test)->name}} (Selected)</option>
								@foreach (App\Test::all() as $test)
								<option value="{{$test->id}}">{{$test->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Collection Date</label>
							<input type="date" name="collection_date" class="form-control" placeholder="Collection Day" value="{{$patientTest->collection_date}}">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Delivery Date</label>
							<input type="date" name="delivery_date" class="form-control" placeholder="Day" value="{{$patientTest->delivery_date}}">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Cost</label>
							<input type="number" name="cost" class="form-control" placeholder="Cost" value="{{$patientTest->cost}}">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Description">{{$patientTest->description}}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="update ml-auto mr-auto">
						<button class="btn btn-primary btn-round">Update Patient Test</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection