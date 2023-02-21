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
			<h4 class="card-title col-6"> Doctors</h4>
			<div class="text-right col-6">
				<a href="{{route('doctor.create')}}" class="btn btn-primary">Add Doctors</a>
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
						@foreach ($doctors as $doctor)
						<tr>
							<td>
								<div class="row">
									<div class="col-3">
										@if ($doctor->photo !=null)
										<img class="avatar border-gray" src="{{$doctor->photo}}" alt="{{$doctor->name}}">
										@else
										<img class="avatar border-gray" src="/uploads/users/avatar.jpg" alt="{{$doctor->name}}">
										@endif
									</div>
									<div class="col-9">
										<a href="{{route('admin.user', $doctor->id)}}"> {{$doctor->name}} </a>
									</div>
								</div>
							</td>
							<td>
								{{$doctor->email}}
							</td>
							<td>
								{{$doctor->country}}
							</td>
							<td>
								{{ucfirst($doctor->role)}}
							</td>
							<td>
								<a class="nav-link dropdown-toggle" id="actionMenu-{{$doctor->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-settings-gear-65"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="actionMenu-{{$doctor->id}}">
									<a class="dropdown-item" href="{{route('admin.user', $doctor->id)}}">View</a>
									<?php if (auth()->user()->role =='admin') { ?>
										<a class="dropdown-item" href="{{route('doctor.delete', $doctor->id)}}">Delete</a>
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