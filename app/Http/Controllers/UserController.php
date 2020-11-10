<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\Role;
use App\UserProfile;

use Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['roles','profile'])->paginate(5);
        // see file url in storage public folder
        //dd(Storage::disk('public')->url($users[0]->profile->photo)); 
        
        //dd(Storage::allFiles('public')); // all only file in public folder 
        
        /* Download File form storage public folder */
        //return Storage::disk('public')->download($users[0]->profile->photo); 
        return view('dashboard.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(); // also write // $roles = \App\Role:all();
        $countries = Country::all(); // $countries = \App\Country:all();
        return view('dashboard.users.create', compact('countries','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required',
            'city' => 'required',
            'phone' => 'required|numeric',
            'country' => 'required',
            'role' => 'required',
            'photo' => 'nullable|image'
        ]);

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        $user = User::create($user);

        // profile photo get and save profiles directory in public folder
        $filename = sprintf('profile_%s.jpg', random_int(1, 1000));
        if($request->hasFile('photo'))
        {
            $filename = $request->file('photo')->storeAs('profiles', $filename, 'public');     
        }
        else
        {
            $filename = "profiles/dummy.jpg";
        }

        // data save in user_profiles table
        if($user)
        {
            $profile = new UserProfile([
                'user_id' => $user->id,
                'city' => $request->city,
                'phone' => $request->phone,
                'country_id' => $request->country,
                'photo' => $filename,
            ]);

            $user->profile()->save($profile);

            // add in pivot table
            $user->roles()->attach($request->role);  // array variable hoy()m
            return redirect()->route('users.index')->with('success','User created successfully.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['roles','profile'])->where('id', $id)->first();
        return view('dashboard.users.show', compact('user'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with(['roles','profile'])->where('id', $id)->first();
        $countries = Country::all();
        $roles = Role::all();

        return view('dashboard.users.edit', compact('user','countries','roles'));
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
        // get record edit user
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $filename = sprintf('profile_%s.jpg', random_int(1, 1000));
        if($request->hasFile('photo'))
        {
            $filename = $request->file('photo')->storeAs('profiles', $filename, 'public');     
        }
        else
        {
            $filename = $user->profile->photo;
        }

        // update only user table data
        if($user->save())
        {
            $profile = [
                'city' => $request->city,
                'phone' => $request->phone,
                'country_id' => $request->country,
                'photo' => $filename,
            ];

            // update data in profile table
            $user->profile()->update($profile);
            // update in pivot table
            $user->roles()->sync($request->role);  // array variable
            return redirect()->route('users.index')->with('success','User update successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile()->delete();
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index')->with('success','User delete successfully.');
    }
}
