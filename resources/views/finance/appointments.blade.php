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
	<div class="card">
		<div class="card-header">
			<a href="/finance" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
			<h4 class="card-title"> Appointment Payments</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-center"  data-paging="true" data-paging-size="7">
					<thead class=" text-primary">
						<th>
							Patient Name
						</th>
						<th>
							Doctor Name
						</th>
						<th>
							Date Time
						</th>
						<th>
							Patient Contact
						</th>
						<th>
							Fees
						</th>
						<th>
							Status
						</th>
						<th>
							Action
						</th>
					</thead>
					<tbody>
						@foreach ($appointments as $appointment)
						<tr>
							<td>
								{{App\User::find($appointment->patient)->name}}
							</td>
							<td>
								{{App\User::find($appointment->doctor)->name}}
							</td>
							<td>
								{{$appointment->date}} ({{App\Timeslot::find($appointment->timeslot)->title}})
							</td>
							<td>
								{{$appointment->number}}
							</td>
							<td>
								{{$appointment->fees}}
							</td>
							<td>
								{{$appointment->status}}
							</td>
							<td>
								<a class="nav-link dropdown-toggle" id="actionMenu-{{$appointment->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-settings-gear-65"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="actionMenu-{{$appointment->id}}">
									<a class="dropdown-item" href="{{route('appointment.view', $appointment->id)}}">View</a>
									@if (auth()->user()->role !='doctor')
									<a class="dropdown-item" href="{{route('appointment.edit', $appointment->id)}}">Edit</a>
									<a class="dropdown-item" href="{{route('appointment.delete', $appointment->id)}}">Delete</a>
									@endif
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection