@php
    if ($profile->email) {
        $explodedEmail = explode("@", $profile->email);
    } else {
        $explodedEmail = null;
    }
    $firstEmail = $explodedEmail[0] ?? null;
    $secondEmail = $explodedEmail[1] ?? null;
@endphp

<div class="d-flex flex-column justify-content-evenly mx-auto form pt-4">
    <div class="d-flex justify-content-evenly flex-column align-items-center align-items-md-start form-group">
        <label class="form-label h1 d-block d-md-inline" for="first-name">First Name</label>
        <input class="form-control" type="text" name="first-name" id="first-name" placeholder="First Name"
            value="{{ $profile->first_name ?? old('first-name') }}">
        <div class="bg-light form-text text-start small m-0 d-none"></div>
    </div>
    <div class="d-flex justify-content-evenly flex-column align-items-center align-items-md-start form-group">
        <label class="form-label h1 d-block d-md-inline" for="last-name">Last Name</label>
        <input class="form-control" type="text" name="last-name" id="last-name" placeholder="Last Name"
            value="{{ $profile->last_name ?? old('last-name') }}">
        <div class="bg-light form-text text-start small m-0 d-none"></div>
    </div>
    <div class="d-flex justify-content-evenly flex-column align-items-center align-items-md-start form-group">
        <label for="email" class="d-block form-label h1 d-md-inline">Email</label>
        <div class="input-group" id="email-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email" value="{{ $firstEmail ?? old('email') }}">
            {{-- Note to self: Splitting the email domain is a terrible idea all around (with autofill saved emails, validation, JS logic, etc.) --}}
                {{-- Take this out when free --}}
            <span class="input-group-text">@</span>
            <label for="domain" class="d-none form-label h1">Domain</label>
            {{-- Consider putting an autocomplete / suggested email domain names here --}}
            <input type="text" class="form-control" id="domain" name="domain" placeholder="Domain" aria-label="Domain" value="{{ $secondEmail ?? old('domain') }}">
            <div class="bg-light form-text text-start small m-0 d-none"></div>
        </div>
    </div>
    <div class="d-flex justify-content-evenly flex-column align-items-center align-items-md-start form-group mb-5">
        <label class="form-label h1 d-block d-md-inline" for="phone">Phone Number</label>
        <input class="form-control" type="number" name="phone" id="phone" placeholder="Numbers Only"
            value="{{ $profile->phone_number ?? old('phone') }}">
        <div class="bg-light form-text text-start small m-0 d-none"></div>
    </div>
</div>
