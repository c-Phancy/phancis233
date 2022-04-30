@php
    $accounts = [];
    // FIX ME: Consider adding a comparison between old and on-hand info
        // If there is an error with validation for one field, other changed fields will also revert back to the original
        // Could be annoying to retype all changed info again
        // Ex. Delete one social account but miss the social-name on another == Account that was intended to be deleted is repopulated
        // Or if you change the name and forget to put in a valid email, the original name is repopulated instead of the replacement name
    if (count($profile->handles) > 0) {
    foreach ($profile->handles->sortBy("social_name") as $i => $account) {
            $accounts[] = [$account->social_name, $account->name];
        }
    } else if (old('social')) {
        foreach (old('social') as $i => $social) {
            $accounts[] = [$social, old('handle')[$i]];
        }
    } else {
        $accounts[] = ["", ""];
    }
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
        <input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email"
            value="{{ $profile->email ?? old('email') }}">
        <div class="bg-light form-text text-start small m-0 d-none"></div>
    </div>
</div>
<div class="d-flex justify-content-evenly flex-column align-items-center align-items-md-start form-group">
    <label class="form-label h1 d-block d-md-inline" for="phone">Phone Number</label>
    <input class="form-control" type="number" name="phone" id="phone" placeholder="Numbers Only"
        value="{{ $profile->phone_number ?? old('phone') }}">
    <div class="bg-light form-text text-start small m-0 d-none"></div>
</div>
<div class="mb-5">
    <fieldset id="social-media-fields">
        <legend class="form-label h1 d-block d-md-inline">Social Media</legend>
        @foreach($accounts as $i => $account)
            <div
                class="d-flex justify-content-evenly flex-column align-items-center align-items-md-start field-container">
                <div class="form-group input-group">
                    <button type="button" class="bg-danger input-group-text text-white">X</button>
                    <input type="text" class="form-control input-group-single" name="social[{{ $i }}]"
                        placeholder="Platform Name" aria-label="Platform" value="{{ $account[0] }}">
                    <div class="bg-light form-text text-start small m-0 d-none"></div>
                </div>
                <div class="input-group form-group mt-1 mb-3">
                    <span class="input-group-text">{{ $i }} | @</span>
                    <input type="text" class="form-control input-group-single" name="handle[{{ $i }}]"
                        placeholder="Handle / Username" aria-label="Handle" value="{{ $account[1] }}">
                    <div class="bg-light form-text text-start small m-0 d-none"></div>
                </div>
            </div>
        @endforeach
    </fieldset>
    <div
        class="button-group account-buttons mt-3 d-flex flex-column flex-md-row px-3 px-md-0 align-items-center justify-content-center justify-content-md-start">
        <button type="button" class="btn bg-light me-md-3 mb-1 mb-md-0" id="account-add">Add Account Field</button>
    </div>
</div>
</div>
