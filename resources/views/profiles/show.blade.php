@extends('layout')

@section('title', "$profile->first_name $profile->last_name")

@section('css')
<link id="custom-stylesheet" rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<address class="text-center text-md-start d-flex flex-column justify-content-evenly text-wrap">
    <div><span class="label d-block h1 fw-bold">Name</span><span class="info">{{ $profile->first_name }}
            {{ $profile->last_name }}</span></div>
    <div><span class="label d-block h1 fw-bold">Email</span><span class="info">{{ $profile->email }}</span></div>
    <div><span class="label d-block h1 fw-bold">Phone</span><span class="info">{{ $profile->phone_number }}</span></div>
    <div>
        <div class="label h1 fw-bold">Social Media</div>
        @if($profile->handles->count() > 0)
            <ul id="social-list" class="list-unstyled d-flex flex-column align-items-center align-items-md-start">
                @foreach($profile->handles->sortBy("social_name") as $handle)
                    <li class="info my-1"><span class="text-uppercase">{{ $handle->social_name }}</span> |
                        {{ $handle->name }}</li>
                @endforeach
            </ul>
            @else 
            <div class="fst-italic">Empty, for now. <span class="d-block">Check back later!</span></div>
        </div>
    @endif
</address>
    <a class="btn slide" id="link-edit"
    href="{{ route('profiles.edit', $profile->id ) }}">Edit Profile</a>
@endsection
