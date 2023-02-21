@extends('layouts.app')

@section('content')

        @include ('admin.dashboard')
        @include ('patient.dashboard')
        @include ('doctor.dashboard')
        @include ('hospital.dashboard')

@endsection
