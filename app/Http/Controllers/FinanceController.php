<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finance;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Finance::all();
         return view('finance.index', ['finances' => $finances, 'siteTitle' => 'Finance Management']);
    }

    /**
     * Show the page of some source
     *
     * @return \Illuminate\Http\Response
     */
    public function appointments()
    {
        $appointments = \App\Appointment::all();
        $siteTitle ="Appointment Payments";
        return view('finance.appointments', ['appointments' => $appointments, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the page of some source
     *
     * @return \Illuminate\Http\Response
     */
    public function fees()
    {
        $doctorfees = \App\DoctorFee::all();
        $siteTitle ="Doctor Fee Payments";
        return view('finance.doctorFees', ['doctorfees' => $doctorfees, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the page of some source
     *
     * @return \Illuminate\Http\Response
     */
    public function tests()
    {
        $patientTest = \App\PatientTest::all();
        $siteTitle ="Test Payments";
        return view('finance.patientTests', ['patientTest' => $patientTest, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the page of some source
     *
     * @return \Illuminate\Http\Response
     */
    public function medicines()
    {
        $patientMedicines = \App\PatientMedicine::all();
        $siteTitle ="Patient Medicines Payments";
        return view('finance.patientMedicines', ['patientMedicines' => $patientMedicines, 'siteTitle' => $siteTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App\Finance::create([
            'type' => 'Appointment Fee',
            'amount' => $request->fees,
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'card_type' => $request->card_type,
            'card_month' => $request->card_month,
            'card_year' => $request->card_year
        ])->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
