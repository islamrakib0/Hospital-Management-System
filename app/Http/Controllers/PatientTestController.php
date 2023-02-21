<?php

namespace App\Http\Controllers;

use App\PatientTest;
use Illuminate\Http\Request;

class PatientTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role =='patient') {
            $patientTest = PatientTest::where('patient', auth()->id())->get();
        } else {
            if (isset($request->patient)) {
             $patientTest = PatientTest::where('patient', $request->patient)->get();
         } else {
            $patientTest = PatientTest::all();
        }
    }
    $siteTitle = "Patient Test Management";
    return view('control.patientTests', ['patientTest' => $patientTest, 'siteTitle' => $siteTitle]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteTitle = "Create Patient Test";
        return view('control.patientTestCreate', ['siteTitle' => $siteTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patientTest = PatientTest::create([
            'patient' => $request->patient,
            'test' => $request->test,
            'collection_date' => $request->collection_date,
            'delivery_date' => $request->delivery_date,
            'cost' => $request->cost,
            'description' => $request->description
        ]);
        $patientTest->save();

        \App\Finance::create([
            'type' => 'Test Fee',
            'amount' => $request->cost,
            'payment_test' => $patientTest->id,
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'card_type' => $request->card_type,
            'card_month' => $request->card_month,
            'card_year' => $request->card_year
        ])->save();

        return redirect(route('patientTest.create'))->with('success', 'Patient Test created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PatientTest  $patientTest
     * @return \Illuminate\Http\Response
     */
    public function show(PatientTest $patientTest)
    {
        $siteTitle = "View Patient Test";
        return view('control.patientTestView', ['siteTitle' => $siteTitle, 'patientTest' => $patientTest]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientTest  $patientTest
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientTest $patientTest)
    {
        $siteTitle = "Edit Patient Test";
        return view('control.patientTestEdit', ['siteTitle' => $siteTitle, 'patientTest' => $patientTest]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientTest  $patientTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientTest $patientTest)
    {
        $patientTest->patient = $request->patient;
        $patientTest->test = $request->test;
        $patientTest->cost = $request->cost;
        $patientTest->collection_date = $request->collection_date;
        $patientTest->delivery_date = $request->delivery_date;
        $patientTest->description = $request->description;
        $patientTest->save();
        return redirect(route('patientTest.edit', $patientTest->id))->with('success', 'Patient Test updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientTest  $patientTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientTest $patientTest)
    {
        $patientTest->delete();
        return redirect(route('patientTests'))->with('success', 'Patient Test deleted successfully!');
    }
}
