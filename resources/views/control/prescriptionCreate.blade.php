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
			<h5 class="card-title">Create Prescription</h5>
		</div>
		<div class="card-body">
			<form method="post">
				@csrf
				<div class="row">
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Appointment</label>
							@if ($appointment !=null)
							#{{$appointment->id}} - 
							{{App\User::find($appointment->doctor)->name ?? 'Not available'}} with  {{App\User::find($appointment->patient)->name ?? 'Not available'}} ({{App\Timeslot::find($appointment->timeslot)->title}})
							<input type="hidden" name="appointment" value="{{$appointment->id}}">
							@else
							<select name="appointment" class="custom-select my-1 mr-sm-2">
								<option>...</option>
								@foreach ($appointments as $appointment)
								<option value="{{$appointment->id}}">{{App\User::find($appointment->doctor)->name}} with  {{App\User::find($appointment->patient)->name}} ({{App\Timeslot::find($appointment->timeslot)->title}})</option>
								@endforeach
							</select>
							@endif
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
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Description"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="update ml-auto mr-auto">
						<button class="btn btn-primary btn-round">Create Prescription</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection