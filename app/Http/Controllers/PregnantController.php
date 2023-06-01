<?php

namespace App\Http\Controllers;

use App\Models\Pregnant;
use Illuminate\Http\Request;

class PregnantController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addPregnant(Request $request)
    {
        return view('pregnant.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pregnant  $pregnant
     * @return \Illuminate\Http\Response
     */
    public function show(Pregnant $pregnant)
    {
        return view('pregnant.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pregnant  $pregnant
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregnant $pregnant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pregnant  $pregnant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pregnant $pregnant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregnant  $pregnant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregnant $pregnant)
    {
        //
    }
}
