<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0 d-flex justify-content-md-start justify-content-center align-items-center">
            @if(View::hasSection('content'))
            @yield('title')
            @else
            Dashboard
            @endif
        </h2>
    </x-slot>
    <x-slot name="pages">
        @if(View::hasSection('pages'))
        @yield('pages')
        @endif
    </x-slot>
                    @if(View::hasSection('content'))
                        <div class="mt-2 px-3 px-md-0">

                        @yield('content')
                    @else
                    <div class="bg-white mt-5 ps-md-5 mx-5 py-3 px-2 px-md-0 text-dark rounded text-center text-md-start">
                        Nothing here to see.<br /><br class="d-block d-md-none" />Head on over to <a class="text-decoration-none dashboard-link"
                            href={{ route('profiles.index') }}>Manage Profiles</a>!
                    @endif
    </div>
</x-app-layout>
