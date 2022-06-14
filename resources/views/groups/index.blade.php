@extends('dashboard')

@section('title', 'View Groups')

@section('pages')
{{ $groups->links('vendor.pagination.custom')}}
@endsection

@section('content')
<ul class="text-center" id="profiles-container">
    @foreach($groups as $group)
        <li class="profile-wrapper text-center text-md-start px-auto py-4 my-1 ps-md-5" id="{{ $group->id }}">
            <p class="profile-name" tabindex="-1">{{ $group->name }}</p>
            <div class="canvas-div d-none">
            <canvas class="canvas py-2" width="0" height="75px"></canvas>
            </div>
            <div class="profile-link-group">
                <div class="profile-link-group-a">
                        <a class="btn profile-view-link profile-link link-a"
                        href="{{ route('groups.show', $group->id) }}">View</a>
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
@endsection
