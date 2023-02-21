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
<div class="col-md-4">
	<div class="card card-user">
		<div class="image">
			<img src="../assets/img/damir-bosnjak.jpg" alt="...">
		</div>
		<div class="card-body">
			<div class="author">
				@if ($patient->photo !=null)
				<img class="avatar border-gray" src="{{$patient->photo}}" alt="{{$patient->name}}">
				@else
				<img class="avatar border-gray" src="/uploads/users/avatar.jpg" alt="{{$patient->name}}">
				@endif
				<h5 class="title">{{$patient->name}}</h5>
			</div>
		</div>
		<div class="card-footer">
			<hr>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="card card-user">
		<div class="card-header">
			<h5 class="card-title">Edit Profile</h5>
		</div>
		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-12 pr-1">
						<label>Profile Picture</label>
						<div class="custom-file">
							<input type="file" name="photo" class="custom-file-input" id="customFile">
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 pr-1">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" placeholder="Name" value="{{$patient->name}}">
						</div>
					</div>
					<div class="col-md-3 px-1">
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Email" value="{{$patient->email}}">
						</div>
					</div>
					<div class="col-md-4 pl-1">
						<div class="form-group">
							<label for="exampleInputEmail1">Phone</label>
							<input type="number" name="phone" class="form-control" placeholder="Phone" value="{{$patient->phone}}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 pr-1">
						<div class="form-group">
							<label>Date of Birth</label>
							<input type="date" name="dob" class="form-control" placeholder="Date of Birth" value="{{$patient->dob}}">
						</div>
					</div>
					<div class="col-md-4 pr-1">
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="country" class="form-control" placeholder="Country" value="{{$patient->country}}">
						</div>
					</div>
					<div class="col-md-4 pr-1">
						<div class="form-group">
							<label>City</label>
							<input type="text" name="city" class="form-control" placeholder="City" value="{{$patient->city}}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" class="form-control" placeholder="Address" value="{{$patient->address}}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="update ml-auto mr-auto">
						<button class="btn btn-primary btn-round">Update Profile</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection