@extends('dashboard')

@section('title', 'Manage Profiles')

@section('pages')
{{ $profiles->links('vendor.pagination.custom')}}
@endsection

{{-- TODO: Add a mouseover/focus event that creates the bottom border even when tabbing (currently limited to hover) --}}
@section('content')
<ul class="text-center" id="profiles-container">
    @foreach($profiles as $profile)
        <li class="profile-wrapper text-center text-md-start px-auto py-4 my-1 ps-md-5" id="{{ $profile->id }}">
            <p class="profile-name" tabindex="-1">{{ $profile->first_name }} {{ $profile->last_name }}</p>
            <div class="canvas-div d-none">
            <canvas class="canvas py-2" width="0" height="75px"></canvas>
            </div>
            <div class="profile-link-group">
                <div class="profile-link-group-a d-flex justify-content-md-start justify-content-evenly">
                    <a class="btn profile-edit-link profile-link link-a"
                        href="{{ route('profiles.edit', $profile->id ) }}">Edit</a>
                        <a class="btn profile-view-link profile-link link-a"
                        href="{{ route('profiles.show', $profile->id) }}">View</a>
                        <form class="profile-link profile-delete-link d-inline-block me-0" action="{{ route('profiles.destroy', $profile->id) }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
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