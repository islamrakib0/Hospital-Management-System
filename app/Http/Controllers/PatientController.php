<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::where('role', 'patient')->get();
        $siteTitle = "Patient Management";
        return view('control.patients', ['patients' => $patients, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteTitle = "Create Patient";
        return view('control.patientCreate', ['siteTitle' => $siteTitle]);
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

        Patient::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'role' => 'patient',
            'photo' => $photo,
            'password' => bcrypt($request->password)
        ])->save();
        return redirect(route('patient.create'))->with('success', 'Patient created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('control.patient', ['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        request()->validate(['photo' => 'mimes:jpeg,png,jpg,bmp,PNG,gif|max:2048']);
        $file = request()->photo;

        if ($file !=null) {
            if ($patient->photo !=null) {
                $fileOld = public_path().$patient->photo;
                unlink($fileOld);
            }

            $filename = 'avatar_'.$patient->id.'_'.time().'.'.$file->getClientOriginalExtension();
            $path = '/uploads/users/';
            $file->move(public_path().$path,$filename);
        }

        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->dob = $request->dob;
        $patient->country = $request->country;
        $patient->city = $request->city;
        $patient->address = $request->address;
        if ($file !=null) {
            $patient->photo = $path.$filename;
        }
        $patient->save();
        return redirect(route('patient', $patient->id))->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        if ($patient->photo !=null) {
            $file = public_path().$patient->photo;
            unlink($file);
        }
        $patient->delete();
        return redirect(route('patients'))->with('success', 'Patient deleted successfully!');
    }
}
