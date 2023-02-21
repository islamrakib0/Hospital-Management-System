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
			<div class="col-3"><button class="btn btn-primary">Back</button></div>
			<h4 class="card-title col-4"> Prescriptions</h4>
			<div class="text-right col-5">
				@if (auth()->user()->role =='admin')
				<a href="{{route('prescription.create')}}" class="btn btn-primary">Add Prescription</a>
				@endif
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-center"  data-paging="true" data-paging-size="7">
					<thead class=" text-primary">
						<th>
							Doctor Name
						</th>
						<th>
							Patient Name
						</th>
						<th>
							Prescription Date
						</th>
						<th>
							Action
						</th>
					</thead>
					<tbody>
						@foreach ($prescriptions as $prescription)
						<tr>
							<td>
								{{App\User::find(App\Appointment::find($prescription->appointment)->doctor)->name}}
							</td>
							<td>
								{{App\User::find(App\Appointment::find($prescription->appointment)->patient)->name}}
							</td>
							<td>
								{{$prescription->date}}
							</td>
							<td>
								<a class="nav-link dropdown-toggle" id="actionMenu-{{$prescription->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-settings-gear-65"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="actionMenu-{{$prescription->id}}">
									<a class="dropdown-item" href="{{route('prescription.view', $prescription->id)}}">View</a>
									@if (auth()->user()->role =='admin')
									<a class="dropdown-item" href="{{route('prescription.edit', $prescription->id)}}">Edit</a>
									<a class="dropdown-item" href="{{route('prescription.delete', $prescription->id)}}">Delete</a>
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