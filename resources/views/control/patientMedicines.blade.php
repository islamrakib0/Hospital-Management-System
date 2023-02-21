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
			<h4 class="card-title col-6"> Patient Medicines</h4>
			<div class="text-right col-6">
				@if (auth()->user()->role =='admin')
				<a href="{{route('patientMedicine.create')}}" class="btn btn-primary">Add Patient Medicine</a>
				@endif
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-center"  data-paging="true" data-paging-size="7">
					<thead class=" text-primary">
						<th>
							Patient Name
						</th>
						<th>
							Medicine Name
						</th>
						<th>
							Date
						</th>
						<th>
							Cost
						</th>
						<th>
							Action
						</th>
					</thead>
					<tbody>
						@foreach ($patientMedicines as $patientMedicine)
						<tr>
							<td>
								{{App\User::find($patientMedicine->patient)->name}}
							</td>
							<td>
								{{$patientMedicine->medicine}}
							</td>
							<td>
								{{$patientMedicine->date}}
							</td>
							<td>
								{{$patientMedicine->cost}}
							</td>
							<td>
								<a class="nav-link dropdown-toggle" id="actionMenu-{{$patientMedicine->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-settings-gear-65"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="actionMenu-{{$patientMedicine->id}}">
									<a class="dropdown-item" href="{{route('patientMedicine.view', $patientMedicine->id)}}">View</a>
									@if (auth()->user()->role =='admin')
									<a class="dropdown-item" href="{{route('patientMedicine.edit', $patientMedicine->id)}}">Edit</a>
									<a class="dropdown-item" href="{{route('patientMedicine.delete', $patientMedicine->id)}}">Delete</a>
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