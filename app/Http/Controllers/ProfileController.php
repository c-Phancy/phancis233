<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \App\Http\Requests\StorePostRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = \App\Models\Profile::paginate(10);
        return view('profiles.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = new \App\Models\Profile;
        return view('profiles.create', ['profile' => $profile]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addAccounts = [];
        if (array_key_exists('social', $this->validatedData($request))) {
            $socials = $request->input('social');
            $handles = $request->input('handle');
            foreach ($socials as $key => $social) {
                $newAccount = $this->newHandle($social, $handles[$key]);
                $addAccounts[] = $newAccount;
            }
        }
        \App\Models\Profile::create($this->validatedData($request));
        foreach ($addAccounts as $account) {
            $account->profile()->associate(\App\Models\Profile::all()->last())->save();
        }
        return redirect()->route('profiles.index')->with('success', 'Profile was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = \App\Models\Profile::findOrFail($id);
        return view('profiles.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = \App\Models\Profile::findOrFail($id);
        return view('profiles.edit', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \App\Models\Profile::find($id)->update($this->validatedData($request));
        // It is allegedly more efficient to delete and recreate for one-to-many relationships
            // Look into this more -> maybe add an identifying key to match handle's original id?
        
        // delete
        $oldAccounts = \App\Models\Profile::find($id)->handles;
        foreach ($oldAccounts as $account) {
            $account->delete();
        }

        // create
        if (array_key_exists('social', $this->validatedData($request))) {
            $socials = $request->input('social');
            $handles = $request->input('handle');
        foreach ($socials as $key => $social) {
            $newAccount = $this->newHandle($social, $handles[$key]);
            $newAccount->profile()->associate(\App\Models\Profile::find($id))->save();
        }
        // KNOWN BUG
            // If an account has its fields blank but not removed from the page and another account has a validation error, 
            //the blank account WILL NOT automatically delete like it should
        }
        // Check if it is possible to redirect the route to the last page in the index (Where the new profile is put)
        return redirect()->route('profiles.index')->with('success', 'Profile was updated successfully!');
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = \App\Models\Profile::find($id);
        $profile->handles()->delete();
        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profile was deleted.');
    }



    private function validatedData($request) {

        $validatedData = $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            // Faker will fail DNS validation if |email is used
                // add in unique when free
            'email' => 'required|email',
            'phone' => 'required|integer',
            'social.*' => 'sometimes|required',
            'handle.*' => 'sometimes|required'
            ]);

        // Is concatenation possible in the validation? Or array_map() / function?
        $validatedData['first_name'] = $validatedData["first-name"];
        unset($validatedData['first-name']);
        $validatedData['last_name'] = $validatedData["last-name"];
        unset($validatedData['last-name']);
        $validatedData['phone_number'] = $validatedData["phone"];
        unset($validatedData['phone']);

        return $validatedData;
    }

    private function newHandle($social, $name) {
        $newAccount = new \App\Models\Handle;
        $newAccount->social_name = $social;
        $newAccount->name = $name;
        return $newAccount;
    }
}
