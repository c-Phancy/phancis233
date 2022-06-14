<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-center">
        Sorry, this feature hasn't been added yet.
    </div>
    <div class="flex items-center justify-center mt-4">
<a class="underline text-sm text-gray-600 text-hover" href="/">
                    {{ __('Go Home') }}
                </a>
</div>
    </x-auth-card>
</x-guest-layout>
