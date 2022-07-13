<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hours;
use App\Models\dealership;
use App\Models\Appoinment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HoursController extends Controller
{

    public function index($dealerid)
    {
        $dealership=dealership::find($dealerid);
        $contains = str_contains($dealership->workdays, date('w') );
        if($contains != null){
        $hours=$dealership->hours();
        return view('appointment.index', ['hours' => $hours]);
        }
        else{
            return "holiday!!";
        }

    }


    public function book($id)
    {
        $hour=Hours::find($id);
        $hour->status=true;
        $hour->save();
        $timestamp = strtotime($hour->startTime ) + 60*60;
        $time = date('H:i:s', $timestamp);
        $app=Appoinment::create([
            'start_time'=>$hour->startTime,
            'end_time'=>$time,
            'appoinment_date'=>date('Y-m-d'),
            'dealership_id'=>Auth::user()->dealership_id,
            'user_id'=>Auth::user()->id,
            // 'dealership_id'=>$dealerid,
            // 'user_id'=>$userid,

        ]);
        return redirect()->back();
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


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
