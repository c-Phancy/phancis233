@extends('layout')

@section('title', 'Create')

@section('css')
<link rel=stylesheet href={{ asset('css/form.css') }}>
@endsection

@section('content')
@if($errors->any())
<div class="toast show mx-5">
  <div class="toast-header d-flex justify-content-center">
      <div style="width: 90%;" class="h4 mb-0">Field Errors</div>
    <button type="button" style="width: 5%;" class="btn d-flex justify-content-center align-items-center" id="toast-button" data-bs-dismiss="toast">X</button>
  </div>
  <div class="toast-body">
      <ul>
    @foreach($errors->all() as $error)
        @php
            $splitError = str_replace("-", " ", $error);
            $splitError = str_replace("@domain", "", $splitError);
        @endphp
        <li>{{ $splitError }}</li>
    @endforeach
      </ul>
</div>
</div>
@endif
<form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex flex-column flex-md-row">
    <div class="text-center text-md-start px-5">
        @include('profiles/form')
    </div>
    <div id="button-group" class="px-5 mb-5 mb-md-0 d-flex flex-column justify-content-center align-items-center">
        <button type="submit" class="btn bg-light bg-light mx-4 mx-md-0 my-md-4" id="submit-button">Create Profile</button>
        <a href="{{ route('profiles.index') }}" class="btn bg-light mx-4 mt-2 mt-md-0 mx-md-0 my-md-4"
            type="button">Cancel</a>
    </div>
    </div>
</form>
@endsection
@section('js')
<script src="{{ asset('js/form.js') }}"></script>
<script>
    document.getElementById('toast-button')?.addEventListener('click', function() {
        document.querySelectorAll('.toast')[0].classList.add('d-none');
    });
    </script>
@endsection