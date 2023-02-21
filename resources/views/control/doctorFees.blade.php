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
			<h4 class="card-title col-6"> Doctor Fees</h4>
			<div class="text-right col-6">
				<a href="{{route('doctorfee.create')}}" class="btn btn-primary">Add Fee</a>
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
							Fee
						</th>
						<th>
							Action
						</th>
					</thead>
					<tbody>
						@foreach ($doctorfees as $doctorfee)
						<tr>
							<td>
								{{App\User::find($doctorfee->doctor)->name}}
							</td>
							<td>
								{{$doctorfee->amount}}
							</td>
							<td>
								<a class="nav-link dropdown-toggle" id="actionMenu-{{$doctorfee->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-settings-gear-65"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="actionMenu-{{$doctorfee->id}}">
									<a class="dropdown-item" href="{{route('doctorfee.edit', $doctorfee->id)}}">Edit</a>
									<a class="dropdown-item" href="{{route('doctorfee.delete', $doctorfee->id)}}">Delete</a>
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