@extends('layout')

@section('title', "$profile->first_name $profile->last_name")

@section('css')
@section('css')
<link id="custom-stylesheet" rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
    <address class="text-center text-md-start d-flex flex-column justify-content-evenly">
        <div><span class="d-block h1 fw-bold">Name</span><span class="info">{{ $profile->first_name }} {{ $profile->last_name }}</span></div>
        <div><span class="d-block h1 fw-bold">Email</span><span class="info">{{ $profile->email }}</span></div>
        <div><span class="d-block h1 fw-bold">Phone</span><span class="info">{{ $profile->phone_number }}</span></div>
    </address>
@endsection