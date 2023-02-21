<?php

namespace App\Http\Controllers;

use App\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role =='patient') {
            $appointment = \App\Appointment::where('patient', auth()->id())->pluck('id')->all();
            $prescriptions = Prescription::whereIn('appointment', $appointment)->get();
        } else {
            if (isset($request->patient)) {
                $appointment = \App\Appointment::where('patient', $request->patient)->pluck('id')->all();
                $prescriptions = Prescription::whereIn('appointment', $appointment)->get();
            } else {
                $prescriptions = Prescription::all();
            }
        }
        $siteTitle = "Prescription Management";
        return view('control.prescriptions', ['prescriptions' => $prescriptions, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->appointment) {
            $appointment = \App\Appointment::findOrFail($request->appointment);
        } else {
            $appointment =null;
        }
        $appointments = \App\Appointment::all();
        $siteTitle = "Create Prescription";
        return view('control.prescriptionCreate', ['siteTitle' => $siteTitle, 'appointments' => $appointments, 'appointment' => $appointment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Prescription::create([
            'appointment' => $request->appointment,
            'date' => $request->date,
            'description' => $request->description
        ])->save();
        return redirect(route('prescription.create'))->with('success', 'Prescription created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        $appointments = \App\Appointment::all();
        $siteTitle = "View Prescription";
        return view('control.prescriptionView', ['siteTitle' => $siteTitle, 'appointments' => $appointments, 'prescription' => $prescription]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        $appointments = \App\Appointment::all();
        $siteTitle = "Edit Prescription";
        return view('control.prescriptionEdit', ['siteTitle' => $siteTitle, 'appointments' => $appointments, 'prescription' => $prescription]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        $prescription->appointment = $request->appointment;
        $prescription->date = $request->date;
        $prescription->description = $request->description;
        $prescription->save();
        return redirect(route('prescription.edit', $prescription->id))->with('success', 'Prescription updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect(route('prescriptions'))->with('success', 'Prescription deleted successfully!');
    }
}
