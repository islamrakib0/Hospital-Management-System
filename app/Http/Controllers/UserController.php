<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $siteTitle = "User Management";
        return view('admin.users', ['users' => $users, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'photo' => 'mimes:jpeg,png,jpg,bmp,PNG,gif|max:2048',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'dob' => 'required',
            ]);
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
            'role' => $request->role,
            'photo' => $photo,
            'password' => bcrypt($request->password)
        ])->save();

        return redirect(route('admin.user.create'))->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $siteTitle = $user->name;
        return view('admin.user', ['user' => $user, 'siteTitle' => $siteTitle]);
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
        return redirect(route('admin.user', $user->id))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->role !='admin') {
            if ($user->photo !=null) {
                $file = public_path().$user->photo;
                unlink($file);
            }
            $user->delete();
            return redirect(route('admin.users'))->with('success', 'Deleted successfully!');
        } else {
            return redirect(route('admin.users'))->with('fail', 'Admin can not be deleted!');
        }
    }
}
