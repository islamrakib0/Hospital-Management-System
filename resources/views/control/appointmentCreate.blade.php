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
					@if (auth()->user()->role =='admin')
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Patient Name</label>
							<select name="patient" class="custom-select my-1 mr-sm-2">
								<option>...</option>
								@foreach (App\User::where('role', 'patient')->get() as $patient)
								<option value="{{$patient->id}}">{{$patient->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					@else
					<input type="hidden" name="patient" value="{{auth()->id()}}">
					@endif
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Doctor Name</label>
							@if (isset($request->doctor))
							<input type="hidden" name="doctor" value="{{$request->doctor}}">{{App\User::findOrFail($request->doctor)->name}}
							@else
							<select name="doctor" class="custom-select my-1 mr-sm-2">
								<option>...</option>
								@foreach (App\User::where('role', 'doctor')->get() as $doctor)
								<option value="{{$doctor->id}}">{{$doctor->name}}</option>
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

					<div class="col-md-3">
						<h5 class="card-title">Make a Payment</h5>
					</div>
					<div class="col-md-9">
						<img src="/assets/img/cards.jpg" height="100px">
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Name of Card</label>
							<input type="text" name="card_name" class="form-control" placeholder="Name of Card">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Card No</label>
							<input type="number" name="card_number" class="form-control" placeholder="Card No">
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group">
							<label>Card Type</label>
							<select name="card_type" class="form-control">
								<option>Visa</option>
								<option>Mastercard</option>
								<option>Discover</option>
								<option>American Express</option>
							</select>
						</div>
					</div>
					<div class="col-md-8 px-1 offset-2">
						<div class="form-group row">
							<label class="col-md-12">Card Expiry</label>
							<select name="card_month" class="form-control col-md-6">
								<option>January</option>
								<option>February</option>
								<option>March</option>
								<option>April</option>
								<option>May</option>
								<option>June</option>
								<option>July</option>
								<option>August</option>
								<option>September</option>
								<option>October</option>
								<option>November</option>
								<option>December</option>
							</select>
							<input type="number" name="card_year" class="form-control col-md-6" placeholder="Card Year">
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