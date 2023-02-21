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

    @if (count($errors) > 0)
        <div class=" col-md-12">
            <div class="alert alert-danger alert-dismissible fade show">
                <ul style="list-style: none; margin-bottom: 0px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class=" col-md-12">
    @endif

    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Create User</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>DOB</label>
                                <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="adress" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-8 px-1 offset-2">
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="custom-select my-1 mr-sm-2">
                                    <option>Select</option>
                                    <option value="receptionist">Receptionist</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button class="btn btn-primary btn-round">Create User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
