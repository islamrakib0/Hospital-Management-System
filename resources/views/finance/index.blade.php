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
			<h4 class="card-title"> Finance Management</h4>
		</div>
		<div class="card-body row">

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-body ">
						<div class="row">
							<div class="col-5 col-md-4">
								<div class="icon-big text-center icon-warning">
									<i class="nc-icon nc-book-bookmark"></i>
								</div>
							</div>
							<div class="col-7 col-md-8">
								<div class="numbers">
									<p class="card-category"><b>Appointment Payments</b></p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer ">
						<hr>
						<a href="/finance/appointments" class="">
							<div class="stats text-center">
								<i class="fa fa-search"></i> View
							</div>
						</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-body ">
						<div class="row">
							<div class="col-5 col-md-4">
								<div class="icon-big text-center icon-warning">
									<i class="nc-icon nc-single-copy-04"></i>
								</div>
							</div>
							<div class="col-7 col-md-8">
								<div class="numbers">
									<p class="card-category"><b>Test Payments</b></p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer ">
						<hr>
						<a href="/finance/tests" class="">
							<div class="stats text-center">
								<i class="fa fa-search"></i> View
							</div>
						</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-body ">
						<div class="row">
							<div class="col-5 col-md-4">
								<div class="icon-big text-center icon-warning">
									<i class="nc-icon nc-money-coins"></i>
								</div>
							</div>
							<div class="col-7 col-md-8">
								<div class="numbers">
									<p class="card-category"><b>Medicine Payments</b></p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer ">
						<hr>
						<a href="/finance/medicines" class="">
							<div class="stats text-center">
								<i class="fa fa-search"></i> View
							</div>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"> All Payments</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table text-center"  data-paging="true" data-paging-size="7">
					<thead class=" text-primary">
						<th>
							ID
						</th>
						<th>
							Payment Type
						</th>
						<th>
							Paid Amount
						</th>
						<th>
							Date
						</th>
					</thead>
					<tbody>
						@foreach ($finances as $finance)
						<tr>
							<td>
								{{$finance->id}}
							</td>
							<td>
								{{$finance->type}}
							</td>
							<td>
								{{$finance->amount}}
							</td>
							<td>
								{{date('Y-m-d', strtotime($finance->created_at))}}
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