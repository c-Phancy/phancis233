<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;
use Illuminate\Pagination\Paginator;

class Profiles extends Component
{

    public $currentId, $first_name, $last_name, $email, $phone_number;
    public $isCreating = 0;
    public $createLabel = "Create";

    //

    public $search = '';
    public $sortBy = 'first_name';
    public $direction = 'asc';
    public $limit = 10;
    public $currentPage = 1;

    public function countProfiles()
    {
        return count(Profile::all());
    }

    // Tutorial from https://medium.com/@branick/search-with-laravel-livewire-cb6dcd4ad541
    // For resetting pagination on live search changes
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];

        Paginator::currentPageResolver(function() {
            return $this->currentPage;
        });
    }

    protected $queryString = [
	'search' => ['except' => ''],
	'sortBy' => ['except' => ''],
	'direction' => ['except' => ''],
	];

    public function sortProfiles($field, $direction)
    {
        $this->sortBy = $field;
        $this->direction = $direction;
    }

    public function render()
    {
        $profiles = Profile::where('first_name', 'like', "%$this->search%")
                                ->orWhere('last_name', 'like', "%$this->search%")
                                ->orderBy($this->sortBy, $this->direction)
                                ->paginate($this->limit);
        return view('livewire.profiles', ['profiles' => $profiles]);
    }

    public function create()
    {
        $this->resetExcept(['search', 'sortBy', 'direction']);
        $this->resetValidation();
        $this->isCreating = 1;
        $this->createLabel = "Create";
    }

    public function cancel()
    {
        $this->resetExcept(['search', 'sortBy', 'direction']);
        $this->resetValidation();
        $this->isCreating = 0;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|integer',
        ]);

        Profile::create($validatedData);

        session()->flash('message', 'Profile successfully created.');
        $this->resetExcept(['search', 'sortBy', 'direction']);
        $this->resetValidation();
    }

    public function edit($id)
    {
        $this->isCreating = 1;
        $this->currentId = $id;
        $this->createLabel = "Update";

        $profile = Profile::find($id);

        $this->first_name = $profile->first_name;
        $this->last_name = $profile->last_name;
        $this->email = $profile->email;
        $this->phone_number = $profile->phone_number;
    }

    public function update($id)
    {
        $profile = Profile::find($id);

        $validatedData = $this->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required|integer',
        ]);

        $profile->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
        ]);

        session()->flash('message', 'Profile successfully updated.');
        $this->resetExcept(['search', 'sortBy', 'direction']);
        $this->resetValidation();
     }

    public function destroy($id)
    {
        Profile::find($id)->delete();
        session()->flash('message', 'Profile successfully deleted.');
    }
}
