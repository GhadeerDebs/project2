<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\dealership;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Hours;
class HoursController extends Controller{
    public function index(Request $request)
    {
            $validator = Validator::make($request->all(),[
                'dealerid' => 'required',

            ]);

            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
        $dealership=dealership::find( $request->dealerid);
        $contains = str_contains($dealership->workdays, date('w') );
        if($contains != null){
        $hours=$dealership->hours();
        return response()->json([
            'data '=>$hours
            ],210);
        }
        else{
            return response()->json([
                'data '=>"the dealership has a day off today"
                ],400);
        }

    }


    public function book( Request $request )
    {
        $validator = Validator::make($request->all(),[
            'hour_id' => 'required',
            'dealerid' => 'required',
            'user_id' => 'required',
            'adv_id' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $hour=Hours::find($request->hour_id);
        $hour->status=true;
        $hour->save();
        $timestamp = strtotime($hour->startTime ) + 60*60;
        $time = date('H:i:s', $timestamp);
        $app=Appoinment::create([
            'start_time'=>$hour->startTime,
            'end_time'=>$time,
            'appoinment_date'=>date('Y-m-d'),
            'dealership_id'=>$request->dealerid,
            'user_id'=>$request->user_id,
            'adv_id'=>$request->adv_id,

        ]);
        if($app != null){
            return response()->json([
                'data '=>'Booked!'
                ],210);
        }

    }
}
