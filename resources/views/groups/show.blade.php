@extends('layout')

@section('title', "$group->name")

@section('css')
{{-- Not css -> consider renaming section to head, etc. --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link id="custom-stylesheet" rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="text-center text-md-start d-flex flex-column justify-content-evenly text-wrap">
    <div class="slide"><span class="label d-block h1 fw-bold">Group Name</span><span class="info">{{ $group->name }}</span></div>
    <div class="slide">
        <div class="label h1 fw-bold">Profiles (Members)</div>
        @if($group->profiles->count() > 0)
            <ul class="list-unstyled d-flex flex-column align-items-center align-items-md-start">
                @foreach($group->profiles as $profile)
                    <li class="info my-1 p-0">
                        {{-- Consider adding a tooltip as the button is not obvious --}}
                        <button class="dropdown-btn btn text-white w-100" data-id="{{ $profile->id }}"><span>{{ $profile->first_name }} {{$profile->last_name}}</span></button>
                        <hr class="d-none my-0" id="hr-{{ $profile->id }}"/>
                        <section id="{{ $profile->id }}" class="d-none p-3">
                            <div><span class="d-block h4 fw-bold">Phone</span><span>{{ $profile->phone_number }}</span></div>
                            <div><span class="d-block h4 fw-bold">Email</span><span>{{ $profile->email }}</span></div>
                            <a class="btn go-to-btn mb-0 mt-2" href="{{ route('profiles.show', $profile->id ) }}">Go to Profile</a>
                        </section>
                    </li>
                @endforeach
            </ul>
        @else 
        <div class="fst-italic">{{ $group->name }} doesn't have any members yet.<span class="d-block">Check back later!</span></div>
        @endif
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/show.js') }}"></script>
@endsection