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
			<h4 class="card-title col-6"> Patient Tests</h4>
			<div class="text-right col-6">
				@if (auth()->user()->role =='admin')
				<a href="{{route('patientTest.create')}}" class="btn btn-primary">Add Patient Test</a>
				@endif
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-center" id="datatable"  data-paging="true" data-paging-size="7">
					<thead class=" text-primary">
						<th>
							Patient Name
						</th>
						<th>
							Test Name
						</th>
						<th>
							Date
						</th>
						<th>
							Delivery Date
						</th>
						<th>
							Cost
						</th>
						<th>
							Action
						</th>
					</thead>
					<tbody>
						@foreach ($patientTest as $patientTest)
						<tr>
							<td>
								{{App\User::find($patientTest->patient)->name}}
							</td>
							<td>
								{{App\Test::find($patientTest->test)->name}}
							</td>
							<td>
								{{$patientTest->collection_date}}
							</td>
							<td>
								{{$patientTest->delivery_date}}
							</td>
							<td>
								{{$patientTest->cost}}
							</td>
							<td>
								<a class="nav-link dropdown-toggle" id="actionMenu-{{$patientTest->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-settings-gear-65"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="actionMenu-{{$patientTest->id}}">
									<a class="dropdown-item" href="{{route('patientTest.view', $patientTest->id)}}">View</a>
									@if (auth()->user()->role =='admin')
									<a class="dropdown-item" href="{{route('patientTest.edit', $patientTest->id)}}">Edit</a>
									<a class="dropdown-item" href="{{route('patientTest.delete', $patientTest->id)}}">Delete</a>
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