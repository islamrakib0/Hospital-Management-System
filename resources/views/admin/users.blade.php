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
			<h4 class="card-title col-6"> Users</h4>
			<div class="text-right col-6">
				<a href="{{route('admin.user.create')}}" class="btn btn-primary">Add User</a>
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
						@foreach ($users as $user)
						<tr>
							<td>
								<div class="row">
									<div class="col-3">
										@if ($user->photo !=null)
										<img class="avatar border-gray" src="{{$user->photo}}" alt="{{$user->name}}">
										@else
										<img class="avatar border-gray" src="/uploads/users/avatar.jpg" alt="{{$user->name}}">
										@endif
									</div>
									<div class="col-9">
										<a href="users/{{$user->id}}"> {{$user->name}} </a>
									</div>
								</div>
							</td>
							<td>
								{{$user->email}}
							</td>
							<td>
								{{$user->country}}
							</td>
							<td>
								{{ucfirst($user->role)}}
							</td>
							<td>
								<a class="nav-link dropdown-toggle" id="actionMenu-{{$user->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="nc-icon nc-settings-gear-65"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="actionMenu-{{$user->id}}">
									<a class="dropdown-item" href="users/{{$user->id}}">Edit</a>
									<a class="dropdown-item" href="users/{{$user->id}}/delete">Delete</a>
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
