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

    // public function index($dealerid)
    // {
    //     $dealership = dealership::find($dealerid);
    //     $contains = str_contains($dealership->workdays, date('w'));
    //     if ($contains != null) {
    //         $hours = $dealership->hours();
    //         $appoinments = $dealership->appoinments();
    //         return view('appointment.index', ['hours' => $hours, 'appoinments' => $appoinments, 'contains' => $contains]);
    //     } else {
    //         return "holiday!!";
    //     }
    // }
    public function index($dealerid)
    {
        //  $dealershipid = dealership::find($dealerid);
        $appoinments = Appoinment::where('dealership_id', $dealerid)->get();
        return view('appointment.index', ['appoinments' => $appoinments]);
    }

    public function book($id)
    {
        $hour = Hours::find($id);
        $hour->status = true;
        $hour->save();
        $timestamp = strtotime($hour->startTime) + 60 * 60;
        $time = date('H:i:s', $timestamp);
        $app = Appoinment::create([
            'start_time' => $hour->startTime,
            'end_time' => $time,
            'appoinment_date' => date('Y-m-d'),
            'dealership_id' => Auth::user()->dealership_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
