<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::where('role', 'doctor')->get();
        $siteTitle = "Doctor Management";
        return view('control.doctors', ['doctors' => $doctors, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteTitle = "Create Doctor";
        return view('control.doctorCreate', ['siteTitle' => $siteTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(['photo' => 'mimes:jpeg,png,jpg,bmp,PNG,gif|max:2048']);
        $file = request()->photo;

        if ($file !=null) {
            $filename = 'avatar_'.time().'.'.$file->getClientOriginalExtension();
            $path = '/uploads/users/';
            $file->move(public_path().$path,$filename);
            $photo = $path.$filename;
        } else {
            $photo =null;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'role' => 'doctor',
            'photo' => $photo,
            'password' => bcrypt($request->password)
        ])->save();
        return redirect(route('doctor.create'))->with('success', 'Doctor created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->photo !=null) {
            $file = public_path().$user->photo;
            unlink($file);
        }
        $user->delete();
        return redirect(route('doctors'))->with('success', 'Doctor deleted successfully!');
    }
}
