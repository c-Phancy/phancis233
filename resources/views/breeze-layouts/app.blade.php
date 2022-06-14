<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link id="custom-stylesheet" rel="stylesheet" href="{{ asset('css/index.css') }}">
<link id="simple-stylesheet" rel="stylesheet" href="/css/index-simple.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-black">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow d-flex justify-content-between py-6 flex-column flex-md-row gap-2">
            <div class="mx-auto text-center text-md-start mx-md-5 ps-md-1 d-flex justify-content-center align-items-center">
                {{ $header }}
            </div>
            <div class="mx-auto text-center text-md-start mx-md-5 ps-md-1">
                {{ $pages }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="{{ asset('js/show.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
<script>
    document.getElementById('toast-button')?.addEventListener('click', function() {
        document.querySelectorAll('.toast')[0].classList.add('d-none');
    });
    </script>
    @if (session()->get('success'))
@php
// Please make a proper toast for this.
    $message = session()->get('success');
    echo("<script>alert('$message');</script>");
    @endphp
@endif
</body>

</html>