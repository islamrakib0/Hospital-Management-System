@extends('layouts.app')

@section('header-script')
<style type="text/css" media="print">
	@media print { .sidebar-wrapper {display: none; } .navbar{display: none;} .btn{display: none;} .status-change{display: none;}}
</style>
@endsection

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
			<h5 class="card-title">Appointment Details of {{App\User::find($appointment->patient)->name}}</h5>
		</div>
		<div class="card-body">
			<form method="post">
				@csrf
				<div class="row">
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Status: </label>
							{{$appointment->status}}
						</div>
					</div>
					@if (auth()->user()->role !='patient')
					<div class="col-md-4 px-1 offset-2 status-change">
						<form method="post">
							@csrf
							<div class="row">
							<div class="col-md-6 px-1">
								<div class="form-group">
									<select name="status" class="custom-select my-1 mr-sm-2">
										<option value="{{$appointment->status}}">{{$appointment->status}} (Selected)</option>
										<option value="Pending">Pending</option>
										<option value="Confirmed">Confirmed</option>
										<option value="Cancelled">Cancelled</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 px-1">
								<button class="btn btn-primary btn-round mt-1">Change Status</button>
							</div>
						</div>
						</form>
					</div>
					@endif
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient: </label>
							{{App\User::find($appointment->patient)->name}}
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Doctor: </label>
							{{App\User::find($appointment->doctor)->name}}
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Date: </label>
							{{$appointment->date}}
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Timeslot: </label>
							{{App\Timeslot::find($appointment->timeslot)->title}}
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Fees: </label>
							{{$appointment->fees}}
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient Phone: </label>
							{{$appointment->number}}
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient Address: </label>
							{{$appointment->address}}
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Description: </label>
							{{$appointment->description}}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="update ml-auto mr-auto">
						<a href="/appointments" class="btn btn-primary btn-round">Back</a>
						<a href="javascript:;" class="btn btn-primary btn-round" onclick="doPrint()">Print</a>
						@if (auth()->user()->role =='doctor')
						<a href="/prescriptions/create?appointment={{$appointment->id}}" class="btn btn-primary btn-round">Add Prescription</a>
						<a href="/prescriptions?patient={{$appointment->patient}}" class="btn btn-primary btn-round">View Prescription History</a>
						<a href="/patienttests?patient={{$appointment->patient}}" class="btn btn-primary btn-round">View Test History</a>
						<a href="/patientmedicines?patient={{$appointment->patient}}" class="btn btn-primary btn-round">View Medicine History</a>
						@endif
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function doPrint() {
		window.print();
	}
</script>
@endsection