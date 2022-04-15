@extends('layout')

@section('title', 'Profiles')
@section('css')
<link id="custom-stylesheet" rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('header')
{{-- add in block view for smaller viewports (if more nav items are added) --}}
<div id="switch-button-group" class="bg-white d-flex justify-content-center">
                <button class="text-center" id="switch-list-view">Switch to List View<span class="fineprint">(Eco
                        Mode)</span></button>
                <button class="text-center rainbow-box d-none" id="switch-normal-view">Switch to Normal View<span
                        class="fineprint">(Performance
                        Mode)</span></button>
</div>
@endsection

@section('content')
<ul class="text-center" id="profiles-container">
    @foreach($profiles as $profile)
        <li class="profile-wrapper" id="{{ $profile->id }}">
            <button class="profile-name" tabindex="-1">{{ $profile->first_name }} {{ $profile->last_name }}</button>
            <div class="canvas-div d-none">
            <canvas class="canvas py-2" width="0" height="75px"></canvas>
            </div>
            <div class="profile-link-group d-none">
                <div class="profile-link-group-a d-flex justify-content-evenly">
                    <a class="btn profile-edit-link profile-link link-a"
                        href="{{ route('profiles.edit', $profile->id ) }}">Edit</a>
                        <a class="btn profile-view-link profile-link link-a"
                        href="{{ route('profiles.show', $profile->id) }}">View</a>
                        <form class="profile-link profile-delete-link d-inline-block" action="{{ route('profiles.destroy', $profile->id) }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
                            @csrf
                            @method('DELETE')
                    <button class="w-100 btn profile-link link-a form-link-a"
                        type="submit">Delete</button>
                        </form>
                </div>
            </div>
        </li>
    @endforeach
</ul>
@endsection
@section('footer')
    <div class="fixed-bottom d-flex justify-content-center align-items-end" id="navigation-button-group">
        <button class="navigation-next" id="first-button" aria-label="Go to first profile">&#171;</button>
                <button class="navigation-next" id="previous-button" aria-label="Previous profile">&#8249;</button>
        <div class="d-flex align-items-center" id="select-profile">
            <select id="profile-select" aria-labelledby="select-profile" class="text-center">
                <option value="" selected disabled>Go to Profile</option>
                @foreach($profiles as $profile)
                {{-- Consider truncating longer names --}}
                <option value="{{ $profile->id }}">{{ $profile->first_name }} {{ $profile->last_name }}</option>
                @endforeach
            </select>
        </div>
        <button class="navigation-next" id="next-button" aria-label="Next profile">&#8250;</button>
        <button class="navigation-next" id="last-button" aria-label="Go to last profile">&#187;</button>
    </div>
    <footer class="bg-white fixed-bottom d-flex justify-content-center align-items-center">
               {{ $profiles->links('vendor.pagination.custom') }}
    </footer>
@endsection
@section('js')
@if (session()->get('success'))
@php
// Please make a proper toast for this.
    $message = session()->get('success');
    echo("<script>alert('$message');</script>");
    @endphp
@endif
<script src="{{ asset('js/index.js') }}"></script>
@endsection
