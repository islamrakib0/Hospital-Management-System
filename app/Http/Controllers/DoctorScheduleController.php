<?php

namespace App\Http\Controllers;

use App\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorSchedules = DoctorSchedule::all();
        $siteTitle = "Doctor Schedule Management";
        return view('control.doctorSchedules', ['doctorSchedules' => $doctorSchedules, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteTitle = "Create Doctor Schedule";
        return view('control.doctorScheduleCreate', ['siteTitle' => $siteTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $DoctorSchedule = DoctorSchedule::create([
            'doctor' => $request->doctor,
            'day' => $request->day,
            'timeslot' => $request->timeslot,
            'description' => $request->description
        ])->save();
        return redirect(route('doctorSchedule.create'))->with('success', 'Doctor Schedule created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorSchedule $doctorSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorSchedule $doctorSchedule)
    {
        $siteTitle = "Edit Doctor Schedule";
        return view('control.doctorScheduleEdit', ['siteTitle' => $siteTitle, 'doctorSchedule' => $doctorSchedule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorSchedule $doctorSchedule)
    {
        $doctorSchedule->doctor = $request->doctor;
        $doctorSchedule->day = $request->day;
        $doctorSchedule->timeslot = $request->timeslot;
        $doctorSchedule->description = $request->description;
        $doctorSchedule->save();
        return redirect(route('doctorSchedule.edit', $doctorSchedule->id))->with('success', 'Doctor Schedule updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoctorSchedule  $doctorSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorSchedule $doctorSchedule)
    {
        $doctorSchedule->delete();
        return redirect(route('doctorSchedules'))->with('success', 'Doctor Schedule deleted successfully!');
    }
}
