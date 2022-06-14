<section class="py-2">
    <h1 class="text-center text-md-start">{{ $this->createLabel }} Profile</h1>
    <form wire:submit.prevent={{ $this->createLabel == "Create" ? "store" : "update($this->currentId)"}} class="d-flex flex-column justify-content-center align-items center justify-content-md-start gap-2 py-1">
        <div class="text-center text-md-start">
            <label hidden for="first_name">First Name</label>
            <input placeholder="First Name" type="text" name="first_name" wire:model="first_name" />
            @error('first_name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="text-center text-md-start">
            <label hidden for="last_name">Last Name</label>
            <input placeholder="Last Name" type="text" name="last_name" wire:model="last_name" />
            @error('last_name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="text-center text-md-start">
            <label hidden for="email">Email</label>
            <input placeholder="Email" type="text" name="email" wire:model="email" />
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="text-center text-md-start">
            <label hidden for="phone_number">Phone Number</label>
            <input placeholder="Phone Number" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" name="phone_number" wire:model="phone_number" />
            @error('phone_number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="d-flex justify-content-md-start justify-content-center gap-2 align-items-center">
        <button type="submit" class="btn btn-store">{{ $this->createLabel }}</button>
        <button type="button" wire:click="cancel" class="btn btn-delete">Cancel</button>
        </div>
    </form>
</section>
