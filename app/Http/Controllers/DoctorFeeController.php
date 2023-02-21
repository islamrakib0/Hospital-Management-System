<?php

namespace App\Http\Controllers;

use App\DoctorFee;
use Illuminate\Http\Request;

class DoctorFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorfees = DoctorFee::all();
        $siteTitle = "Doctor Fee Management";
        return view('control.doctorFees', ['doctorfees' => $doctorfees, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteTitle = "Create Doctor Fee";
        return view('control.doctorFeeCreate', ['siteTitle' => $siteTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeslot = DoctorFee::create([
            'doctor' => $request->doctor,
            'amount' => $request->amount,
            'description' => $request->description
        ])->save();
        return redirect(route('doctorfee.create'))->with('success', 'Doctor Fee created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DoctorFee  $doctorFee
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorFee $doctorFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoctorFee  $doctorFee
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorFee $doctorFee)
    {
        $siteTitle = "Edit Doctor Fee";
        return view('control.doctorFeeEdit', ['doctorfee' => $doctorFee, 'siteTitle' => $siteTitle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoctorFee  $doctorFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorFee $doctorFee)
    {
        $doctorFee->doctor = $request->doctor;
        $doctorFee->amount = $request->amount;
        $doctorFee->description = $request->description;
        $doctorFee->save();
        return redirect(route('doctorfee.edit', $doctorFee->id))->with('success', 'Doctor Fee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoctorFee  $doctorFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorFee $doctorFee)
    {
        $doctorFee->delete();
        return redirect(route('doctorfees'))->with('success', 'Doctor Fee deleted successfully!');
    }
}
