@php ($siteTitle='Login')
@extends('layouts.app')

@section('background')
@if(Request::path() =='patient-login')
/assets/img/patient.jpg
@elseif(Request::path() =='doctor-login')
/assets/img/doctor.jpg
@elseif(Request::path() =='receptionist-login')
/assets/img/hospital.jpg
@else
/assets/img/admin.jpg
@endif
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            @if (session('fail'))
                <div class="alert alert-danger text-center text-light" role="alert">
                    {{session('fail')}}
                </div>
                @endif
            <div class="card">
                <div class="card-header text-md-center">{{ $pageTitle ?? 'Admin Login' }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" name="role" value="{{Request::path() ==='login' ? 'admin':''}}{{Request::path() ==='patient-login' ? 'patient':''}}{{Request::path() ==='doctor-login' ? 'doctor':''}}{{Request::path() ==='receptionist-login' ? 'receptionist':''}}">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
