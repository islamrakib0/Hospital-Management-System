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
		<div class="card-header row">
			<h4 class="card-title col-6"> Patients</h4>
			<div class="text-right col-6">
				<a href="{{route('patient.create')}}" class="btn btn-primary">Add Patient</a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table"  data-paging="true" data-paging-size="7">
					<thead class=" text-primary">
						<th>
							Name
						</th>
						<th>
							Email
						</th>
						<th>
							Country
						</th>
						<th>
							Role
						</th>
						<th>
							Action
						</th>
					</thead>
					<tbody>
						@foreach ($patients as $patient)
						<tr>
							<td>
								<div class="row">
									<div class="col-3">
										@if ($patient->photo !=null)
										<img class="avatar border-gray" src="{{$patient->photo}}" alt="{{$patient->name}}">
										@else
										<img class="avatar border-gray" src="/uploads/users/avatar.jpg" alt="{{$patient->name}}">
										@endif
									</div>
									<div class="col-9">
										<a href="{{route('patient', $patient->id)}}"> {{$patient->name}} </a>
									</div>
								</div>
							</td>
							<td>
								{{$patient->email}}
							</td>
							<td>
								{{$patient->country}}
							</td>
							<td>
								{{ucfirst($patient->role)}}
							</td>
							<td>
								<a class="nav-link dropdown-toggle" id="actionMenu-{{$patient->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-settings-gear-65"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="actionMenu-{{$patient->id}}">
									<a class="dropdown-item" href="{{route('patient', $patient->id)}}">View</a>
									<?php if (auth()->user()->role =='admin') { ?>
										<a class="dropdown-item" href="{{route('patient.delete', $patient->id)}}">Delete</a>
									<?php } ?>
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