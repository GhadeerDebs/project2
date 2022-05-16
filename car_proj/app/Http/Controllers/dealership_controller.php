<?php

namespace App\Http\Controllers;

use App\Models\dealership;
use Illuminate\Http\Request;

class dealership_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $dealerships=dealership::all();
          return view('Dealership.index', ['dealerships'=>$dealerships]);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function show(dealership $dealership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function edit(dealership $dealership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dealership $dealership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function destroy(dealership $dealership)
    {
        //
    }
}
