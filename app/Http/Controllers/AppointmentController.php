<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role =='patient') {
            $appointments = Appointment::where('patient', auth()->id())->get();
        } else {
            $appointments = Appointment::all();
        }
        $siteTitle = "Appointment Management";
        return view('control.appointments', ['appointments' => $appointments, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $siteTitle = "Create Appointment";
        return view('control.appointmentCreate', ['siteTitle' => $siteTitle, 'request' => $request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = Appointment::create([
            'patient' => $request->patient,
            'doctor' => $request->doctor,
            'date' => $request->date,
            'timeslot' => $request->timeslot,
            'fees' => $request->fees,
            'status' => 'Pending',
            'number' => $request->number,
            'address' => $request->address,
            'description' => $request->description
        ]);
        $appointment->save();

        \App\Finance::create([
            'type' => 'Appointment Fee',
            'amount' => $request->fees,
            'payment_appointment' => $appointment->id,
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'card_type' => $request->card_type,
            'card_month' => $request->card_month,
            'card_year' => $request->card_year
        ])->save();

        return redirect(route('appointment.create'))->with('success', 'Appointment created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $siteTitle = "View Appointment";
        return view('control.appointmentView', ['siteTitle' => $siteTitle, 'appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $siteTitle = "Edit Appointment";
        return view('control.appointmentEdit', ['siteTitle' => $siteTitle, 'appointment' => $appointment]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Appointment $appointment)
    {
        $appointment->status = $request->status;
        $appointment->save();
        return redirect(route('appointment.view', $appointment->id))->with('success', 'Appointment status updated successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $appointment->patient = $request->patient;
        $appointment->doctor = $request->doctor;
        $appointment->date = $request->date;
        $appointment->timeslot = $request->timeslot;
        $appointment->fees = $request->fees;
        if ($request->status !=null) {
            $appointment->status = $request->status;
        }
        $appointment->number = $request->number;
        $appointment->address = $request->address;
        $appointment->description = $request->description;
        $appointment->save();
        return redirect(route('appointment.edit', $appointment->id))->with('success', 'Appointment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect(route('appointments'))->with('success', 'Appointment deleted successfully!');
    }
}
