@section('title', 'Profiles')
@section('css')
<link rel="stylesheet" href={{ asset('css/app-livewire.css' ) }} />
@endsection
<div>
    @if(session()->has('message'))
        <div class="alert alert-success py-2">
            {{ session('message') }}
        </div>
    @endif
    <div class="p-1 p-md-3">
        <button type="button" class="btn btn-primary{{$this->isCreating ? " d-none" : "" }}"
            wire:click="create()">
            Create
        </button>
        <button type="button" class="btn btn-primary{{$this->isCreating ? "" : " d-none" }}" wire:click="cancel">
            Close
        </button>
        <div class="d-flex justify-content-center align-items-center justify-content-md-start {{ $this->isCreating ? "" : "d-none" }}">
            @include('livewire.modal')
        </div>
    </div>
        <div class={{ $this->isCreating ? "d-none" : "d-block" }}>
        <div
            class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between px-5 align-items-center py-3">
            <input wire:model="search" type="text" placeholder="Search" size="50" />
            <select class="mt-3 mt-md-0" wire:model="limit" class="form-select form-select-lg"
                aria-label=".form-select-lg example">
                <option value={{ 10 }}>Show 10</option>
                <option value={{ 25 }}>Show 25</option>
                <option value={{ 50 }}>Show 50</option>
                <option value={{ $this->countProfiles() }}>Show All</option>
            </select>
        </div>
        <div class="pb-3 d-flex justify-content-center align-items-center">
            {{ $profiles->onEachSide(1)->links('vendor.pagination.custom-livewire') }}
        </div>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">
                            <div class="text-nowrap">
                                <a class="text-decoration-none" href="#" wire:click="sortProfiles('first_name', 'asc')">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                First Name
                                <a class="text-decoration-none" href="#"
                                    wire:click="sortProfiles('first_name', 'desc')">
                                    <i class="bi bi-arrow-down"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="text-nowrap">
                                <a class="text-decoration-none" href="#" wire:click="sortProfiles('last_name', 'asc')">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                Last Name
                                <a class="text-decoration-none" href="#" wire:click="sortProfiles('last_name', 'desc')">
                                    <i class="bi bi-arrow-down"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="text-nowrap">
                                <a class="text-decoration-none" href="#" wire:click="sortProfiles('email', 'asc')">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                Email
                                <a class="text-decoration-none" href="#" wire:click="sortProfiles('email', 'desc')">
                                    <i class="bi bi-arrow-down"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="text-nowrap">
                                Phone Number
                            </div>
                        </th>
                        <th scope="col">
                                    <a class="text-decoration-none" href="#" wire:click="sortProfiles('id', 'asc')">
                                    <i class="bi bi-arrow-up"></i>
                                </a>
                                Created At
                                <a class="text-decoration-none" href="#"
                                    wire:click="sortProfiles('id', 'desc')">
                                    <i class="bi bi-arrow-down"></i>
                                </a>
                        </th>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td class="align-middle">{{ $profile->first_name }}</td>
                            <td class="align-middle">{{ $profile->last_name }}</td>
                            <td class="align-middle">{{ $profile->email }}</td>
                            <td class="align-middle">{{ $profile->phone_number }}</td>
                            <td class="align-middle">
                                <button data-bs-toggle="modal" data-bs-target="#modal"
                                    class="btn btn-store mx-2"
                                    wire:click="edit({{ $profile->id }})">Edit</button>
                                {{-- No verification for destructive action!!! --}}
                                <button class="btn btn-delete mx-2"
                                    wire:click="destroy({{ $profile->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            {{ $profiles->links('vendor.pagination.custom-livewire-full') }}
        </div>
    </div>
</div>
