<?php

namespace App\Http\Controllers;

use App\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeslots = Timeslot::all();
        $siteTitle = "Timeslot Management";
        return view('control.timeslots', ['timeslots' => $timeslots, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteTitle = "Timeslot Management";
        return view('control.timeslotCreate', ['siteTitle' => $siteTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeslot = Timeslot::create([
            'title' => $request->title,
            'description' => $request->description
        ])->save();
        return redirect(route('timeslot.create'))->with('success', 'Timeslot created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function show(Timeslot $timeslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function edit(Timeslot $timeslot)
    {
        return view('control.timeslotEdit', ['timeslot' => $timeslot]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timeslot $timeslot)
    {
        $timeslot->title = $request->title;
        $timeslot->description = $request->description;
        $timeslot->save();
        return redirect(route('timeslot.edit', $timeslot->id))->with('success', 'Timeslot updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timeslot $timeslot)
    {
        $timeslot->delete();
        return redirect(route('timeslots'))->with('success', 'Timeslot deleted successfully!');
    }
}
