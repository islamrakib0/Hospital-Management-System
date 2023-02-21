@extends('layouts.app')

@section('header-script')
<style type="text/css" media="print">
	@media print { .sidebar-wrapper {display: none; } .navbar{display: none;} .btn{display: none;}}
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
			<h5 class="card-title">Prescription Details of <b>{{App\User::find(App\Appointment::find($prescription->appointment)->patient)->name}}</b></h5>
		</div>
		<div class="card-body">
			<form method="post">
				@csrf
				<div class="row">
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Appointment Details: </label>
							<ul>
								<li>Doctor Name: {{App\User::find(App\Appointment::find($prescription->appointment)->doctor)->name}}</li>

								<li>Patient Name: {{App\User::find(App\Appointment::find($prescription->appointment)->patient)->name}}</li>

								<li>Date & Timeslot: {{App\Appointment::find($prescription->appointment)->date}}
									({{App\Timeslot::find(App\Appointment::find($prescription->appointment)->timeslot)->title}})</li>
								</ul>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Date: </label>
							{{$prescription->date}}
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Description: </label>
							{{$prescription->description}}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="update ml-auto mr-auto">
						<a href="/prescriptions" class="btn btn-primary btn-round">Back</a>
						<a href="javascript:;" class="btn btn-primary btn-round" onclick="doPrint()">Print</a>
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