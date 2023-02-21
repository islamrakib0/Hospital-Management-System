<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        $siteTitle = "Tests Management";
        return view('control.tests', ['tests' => $tests, 'siteTitle' => $siteTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteTitle = "Create Test";
        return view('control.testCreate', ['siteTitle' => $siteTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Test::create([
            'name' => $request->name,
            'cost' => $request->cost,
            'duration' => $request->duration,
            'sample' => $request->sample,
            'description' => $request->description
        ])->save();
        return redirect(route('test.create'))->with('success', 'Test created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $siteTitle = "Edit Test";
        return view('control.testEdit', ['siteTitle' => $siteTitle, 'test' => $test]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $test->name = $request->name;
        $test->cost = $request->cost;
        $test->duration = $request->duration;
        $test->sample = $request->sample;
        $test->description = $request->description;
        $test->save();
        return redirect(route('test.edit', $test->id))->with('success', 'Test updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect(route('tests'))->with('success', 'Test deleted successfully!');
    }
}
