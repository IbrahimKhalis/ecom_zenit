<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ImageUploadingTrait;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    use ImageUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::all();

        return $profile;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'firstname' => 'bail|required|max:255',
            'lastname' => 'required|max:255',
            'phoneNumber' => 'required|numeric',
            'Address' => 'required',
            'gallery'=>'required',
        ]);

        $profile = Profile::create([
            'user_id' => Auth()->id(),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phoneNumber' => $request->phoneNumber,
            'Address' => $request->Address
        ]);

        foreach ($request->input('gallery', []) as $file) {
            $profile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('profilecust');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $profile = User::find(auth()->id())->profile;

        return view('profileedit-cust', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'bail|required|max:255',
            'lastname' => 'required|max:255',
            'phoneNumber' => 'required|numeric',
            'Address' => 'required',
            'gallery'=>'required',
        ]);
        
        
        $profile = Profile::where('user_id', auth()->id())->first();

        $profile->update($request->all());

        if (count($profile->gallery) > 0) {
            foreach ($profile->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $profile->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $profile->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
