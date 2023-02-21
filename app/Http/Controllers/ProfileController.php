<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile', ['user' => auth()->user()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profileDelete');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        request()->validate(['photo' => 'mimes:jpeg,png,jpg,bmp,PNG,gif|max:2048']);
        $file = request()->photo;

        if ($file !=null) {
            if ($user->photo !=null) {
                $fileOld = public_path().$user->photo;
                unlink($fileOld);
            }

            $filename = 'avatar_'.$user->id.'_'.time().'.'.$file->getClientOriginalExtension();
            $path = '/uploads/users/';
            $file->move(public_path().$path,$filename);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;
        if ($file !=null) {
            $user->photo = $path.$filename;
        }
        $user->save();
        return redirect(route('profile'))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = auth()->user();
        if ($user->role !='admin') {
            $file = public_path().$user->photo;
            unlink($file);
            $user->delete();
            return redirect(route('login'));
        } else {
            return redirect(route('profile'))->with('fail', 'Admin can not be deleted!');
        }
    }
}
