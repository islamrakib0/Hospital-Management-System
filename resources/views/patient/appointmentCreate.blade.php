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
			<h5 class="card-title">Create Appointment</h5>
		</div>
		<div class="card-body">
			<form method="post">
				@csrf
				<div class="row">
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient</label>
							<select name="patient" class="custom-select my-1 mr-sm-2">
								<option>...</option>
								@foreach (App\User::where('role', 'patient')->get() as $patient)
								<option value="{{$patient->id}}">{{$patient->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Doctor</label>
							<select name="doctor" class="custom-select my-1 mr-sm-2">
								<option>...</option>
								@foreach (App\User::where('role', 'doctor')->get() as $doctor)
								<option value="{{$doctor->id}}">{{$doctor->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="date" class="form-control" placeholder="Date">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Timeslot</label>
							<select name="timeslot" class="custom-select my-1 mr-sm-2">
								<option>...</option>
								@foreach (App\Timeslot::all() as $timeslot)
								<option value="{{$timeslot->id}}">{{$timeslot->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Fees</label>
							<input type="number" name="fees" class="form-control" placeholder="Fees">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient Phone</label>
							<input type="text" name="number" class="form-control" placeholder="Patient Phone">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient Address</label>
							<input type="text" name="address" class="form-control" placeholder="Patient Address">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Description"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="update ml-auto mr-auto">
						<button class="btn btn-primary btn-round">Create Appointment</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection