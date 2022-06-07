@php

// For when there are duplicate groups -> appends number after name
    // For the purpose of the assignment, the table does not take duplicate values
    $groups = $profile->groups->sortBy('name');

    $countGroups = $groups->countBy('name');

    foreach($countGroups as $group => $counts) {
        if ($counts === 1) {
            unset($countGroups[$group]);
        }
    }

    $i = 1;
    $groups->each(function($group) use(&$i, $countGroups) {
        if (isset($countGroups[$group->name])) {
                $oldName = $group->name;
                if ($i > 1) {
                    $group->name = $group->name . " ($i)";
                }
                $i++;
                if ($i > $countGroups[$oldName]) {
                    $i = 1;
                }
        } else {
            $i = 1;
        }
    });

@endphp

@extends('dashboard')

@section('title', "$profile->first_name $profile->last_name")

<link id="custom-stylesheet" rel="stylesheet" href="{{ asset('css/show.css') }}">

@section('content')
<address class="text-center text-md-start d-flex flex-column justify-content-evenly text-wrap ps-md-5 gap-4 mt-4">
    <div class="slide"><span class="label d-block h1 fw-bold">Name</span><span class="info">{{ $profile->first_name }}
            {{ $profile->last_name }}</span></div>
    <div class="slide"><span class="label d-block h1 fw-bold">Email</span><span class="info">{{ $profile->email }}</span></div>
    <div class="slide"><span class="label d-block h1 fw-bold">Phone</span><span class="info">{{ $profile->phone_number }}</span></div>
    <div class="slide">
        <div class="label h1 fw-bold">Social Media</div>
        @if($profile->handles->count() > 0)
            <ul id="social-list" class="list-unstyled d-flex flex-column align-items-center align-items-md-start mb-0">
                @foreach($profile->handles->sortBy("social_name") as $handle)
                    <li class="info my-1"><span class="text-uppercase">{{ $handle->social_name }}</span> |
                        {{ $handle->name }}</li>
                @endforeach
            </ul>
        @else 
        <div class="fst-italic">Empty, for now. <span class="d-block">Check back later!</span></div>
        @endif
    </div>
    <div class="slide">
        <div class="label h1 fw-bold">Groups</div>
        @if($groups->count() > 0)
            <ul class="list-unstyled d-flex flex-column align-items-center align-items-md-start">
                @foreach($groups as $group)
                    <li class="info my-1 group-info"><a class="w-100 text-decoration-none text-white" href="{{ route('groups.show', $group->id) }}">{{ $group->name }}</a></li>
                @endforeach
            </ul>
        @else 
        <div class="fst-italic">{{ $profile->first_name }} {{ $profile->last_name }} hasn't joined any groups yet.<span class="d-block">Check back later!</span></div>
        @endif
    </div>
</address>
<div class="slide d-flex justify-content-center justify-content-md-start ps-md-5">
    <a class="btn" id="link-edit"
    href="{{ route('profiles.edit', $profile->id ) }}">Edit Profile</a>
@endsection
