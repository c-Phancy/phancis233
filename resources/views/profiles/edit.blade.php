@extends('dashboard')

@section('title', 'Update Profile')

@section('content')
@if($errors->any())
<div class="toast show mx-md-5 mt-4">
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
<form method="POST" action="{{ route('profiles.update', $profile->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="d-flex flex-column flex-md-row">
    <div class="text-center text-md-start px-5">
        @include('profiles/form')
    </div>
    <div id="button-group" class="px-5 mb-5 mb-md-0 d-flex flex-column align-items-center align-items-md-start">
        <button type="submit" class="btn bg-light bg-light mx-4 mx-md-0 my-md-4" id="submit-button">Update Profile</button>
        <a href="{{ route('profiles.index') }}" class="btn bg-light mx-4 mt-2 mt-md-0 mx-md-0 my-md-4"
            type="button">Cancel</a>
    </div>
    </div>
</form>
@endsection

