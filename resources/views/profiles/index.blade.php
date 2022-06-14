@php
    $sortBy = request()->get('sortBy');
    $direction = request()->get('direction');
@endphp

@extends('dashboard')

@section('title', 'Manage Profiles')

@section('pages')
{{ $profiles->withQueryString()->links('vendor.pagination.custom')}}
@endsection

{{-- TODO: Add a mouseover/focus event that creates the bottom border even when tabbing (currently limited to hover) --}}
@section('content')
<div class="table-responsive bg-white">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">
                            <div class="text-nowrap">
                                <a href={{ route('profiles.index', ["sortBy" => "first_name", "direction" => $sortBy == "first_name" ? $direction == "asc" ? "desc" : "asc" : "asc"]) }} class="text-decoration-none">First Name</a>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="text-nowrap">
                                <a href={{ route('profiles.index', ["sortBy" => "last_name", "direction" => $sortBy == "last_name" ? $direction == "asc" ? "desc" : "asc" : "asc"]) }} class="text-decoration-none">Last Name</a>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="text-nowrap">
                                <a href={{ route('profiles.index', ["sortBy" => "email", "direction" => $sortBy == "email" ? $direction == "asc" ? "desc" : "asc" : "asc"]) }} class="text-decoration-none">Email</a>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="text-nowrap">
                                Phone Number
                            </div>
                        </th>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td class="align-middle">{{ $profile->first_name }}</td>
                            <td class="align-middle">{{ $profile->last_name }}</td>
                            <td class="align-middle">{{ $profile->email }}</td>
                            <td class="align-middle">{{ $profile->phone_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection