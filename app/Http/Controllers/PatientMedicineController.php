<?php

namespace App\Http\Controllers;

use App\PatientMedicine;
use Illuminate\Http\Request;

class PatientMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role =='patient') {
            $patientMedicines = PatientMedicine::where('patient', auth()->id())->get();
        } else {
            if (isset($request->patient)) {
                $patientMedicines = PatientMedicine::where('patient', $request->patient)->get();
            } else {
                $patientMedicines = PatientMedicine::all();
            }
        }
        $siteTitle = "Patient Medicine Management";
        return view('control.patientMedicines', ['patientMedicines' => $patientMedicines, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteTitle = "Create Patient Medicine";
        return view('control.patientMedicineCreate', ['siteTitle' => $siteTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patientMedicine = PatientMedicine::create([
            'patient' => $request->patient,
            'date' => $request->date,
            'cost' => $request->cost,
            'medicine' => $request->medicine
        ]);
        $patientMedicine->save();

        \App\Finance::create([
            'type' => 'Medicine Cost',
            'amount' => $request->cost,
            'payment_medicine' => $patientMedicine->id,
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'card_type' => $request->card_type,
            'card_month' => $request->card_month,
            'card_year' => $request->card_year
        ])->save();

        return redirect(route('patientMedicine.create'))->with('success', 'Patient Medicine created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PatientMedicine  $patientMedicine
     * @return \Illuminate\Http\Response
     */
    public function show(PatientMedicine $patientMedicine)
    {
        $siteTitle = "View Patient Medicine";
        return view('control.patientMedicineView', ['siteTitle' => $siteTitle, 'patientMedicine' => $patientMedicine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientMedicine  $patientMedicine
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientMedicine $patientMedicine)
    {
        $siteTitle = "Edit Patient Medicine";
        return view('control.patientMedicineEdit', ['siteTitle' => $siteTitle, 'patientMedicine' => $patientMedicine]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientMedicine  $patientMedicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientMedicine $patientMedicine)
    {
        $patientMedicine->patient = $request->patient;
        $patientMedicine->cost = $request->cost;
        $patientMedicine->date = $request->date;
        $patientMedicine->medicine = $request->medicine;
        $patientMedicine->save();
        return redirect(route('patientMedicine.edit', $patientMedicine->id))->with('success', 'Patient Medicine updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientMedicine  $patientMedicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientMedicine $patientMedicine)
    {
        $patientMedicine->delete();
        return redirect(route('patientMedicines'))->with('success', 'Patient Test deleted successfully!');
    }
}
