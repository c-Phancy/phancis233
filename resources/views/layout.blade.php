<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @yield('css')
</head>

<body>
    <header class="sticky-top d-flex">
        @yield('header')
        <nav class="navbar navbar-light text-end align-items-center d-flex justify-content-end py-2 pe-3 bg-light">
            <ul class="navbar-nav d-flex flex-row ms-auto bg-light">
                <div>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('profiles.index') }}">Profiles</a>
                    </li>
                </div>
                <div>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('groups.index') }}">Groups</a>
                    </li>
                </div>
                <div>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('profiles.create') }}">Create</a>
                    </li>
                </div>
                @if(Auth::check())
                <div>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="{{ route('dashboard') }}">My Dash</a>
                    </li>
                </div>
                @endif
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    @yield('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/layout.js') }}"></script>
    @yield('js')
</body>

</html>
