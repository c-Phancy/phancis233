@extends('layout')

@section('title', 'Groups')
@section('css')
<link id="custom-stylesheet" rel="stylesheet" href="{{ asset('css/index.css') }}">
<link id="simple-stylesheet" rel="stylesheet" href="/css/index-simple.css">
@endsection

@section('content')
<ul class="text-center" id="profiles-container">
    @foreach($groups as $group)
        <li class="profile-wrapper" id="{{ $group->id }}">
            <p class="profile-name" tabindex="-1">{{ $group->name }}</p>
            <div class="canvas-div d-none">
            <canvas class="canvas py-2" width="0" height="75px"></canvas>
            </div>
            <div class="profile-link-group">
                <div class="profile-link-group-a">
                    <a class="btn profile-edit-link profile-link link-a disabled"
                        href="{{ route('groups.edit', $group->id ) }}">Edit</a>
                        <a class="btn profile-view-link profile-link link-a"
                        href="{{ route('groups.show', $group->id) }}">View</a>
                        <form class="profile-link profile-delete-link d-inline-block" action="{{ route('groups.destroy', $group->id) }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
                            @csrf
                            @method('DELETE')
                    <button class="w-100 btn profile-link link-a form-link-a disabled"
                        type="submit">Delete</button>
                        </form>
                </div>
            </div>
        </li>
    @endforeach
</ul>
@endsection
@section('footer')
    <footer class="bg-white fixed-bottom d-flex justify-content-center align-items-center">
               {{ $groups->links('vendor.pagination.custom') }}
    </footer>
@endsection
@section('js')
<script src="{{ asset('js/index.js') }}"></script>
@endsection
