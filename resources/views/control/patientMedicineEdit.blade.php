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
			<h5 class="card-title">Edit Patient Medicine</h5>
		</div>
		<div class="card-body">
			<form method="post">
				@csrf
				<div class="row">
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient</label>
							<select name="patient" class="custom-select my-1 mr-sm-2">
								<option value="{{$patientMedicine->patient}}">{{App\User::find($patientMedicine->patient)->name}} (Selected)</option>
								@foreach (App\User::where('role', 'patient')->get() as $patient)
								<option value="{{$patient->id}}">{{$patient->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="date" class="form-control" placeholder="Date" value="{{$patientMedicine->date}}">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Cost</label>
							<input type="number" name="cost" class="form-control" placeholder="Cost" value="{{$patientMedicine->cost}}">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Medicine Details</label>
							<textarea name="medicine" class="form-control" placeholder="Medicine Details">{{$patientMedicine->medicine}}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="update ml-auto mr-auto">
						<button class="btn btn-primary btn-round">Update Patient Medicine</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection