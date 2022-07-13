<?php

namespace App\Http\Controllers;

use App\Models\dealership;
use App\Models\Hours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class dealership_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dealerships = dealership::all();
        return view('dealership.index', ['dealerships' => $dealerships]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dealership.create');
    }


    public function store(Request $request)
    {
        $days = array(
            'workdays' => $request->workdays,
        );

        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'dealer_photo_path' => 'required|image',
            'startTime' => 'required',
            'endTime' => 'required',
            'workdays' =>'required'
        ]);
        $photo =  $request->file('dealer_photo_path');
        $newphoto = time() . $photo->getClientOriginalName();
        $photo->move('dealer', $newphoto);
        $dealership = dealership::create([
            'name' => $request->name,
            'location' => $request->location,
            'phone' => $request->phone,
            'dealer_photo_path' => 'dealer/' . $newphoto,
            'startTime' =>$request->startTime,
            'endTime' => $request->endTime,
            'workdays' =>json_encode($days)

        ]);
        $start=$request->startTime;
        $end=$request->endTime;

            $start_time = Carbon::parse($start)->format(' g:i a');
            $end_time = Carbon::parse($end)->format(' g:i a');
            $totalDuration =Carbon::parse($start_time)->diffInHours($end_time);
            $num=explode(" ",$totalDuration);
            $time = new Carbon($start_time);
        for( $i=0;$i<$num[0];$i++){
            $hours=Hours::create([
                'startTime'=>$time
            ]);
            $dealership->hour()->attach($hours);
          //  $dealership->hours()->attach($hours->id);
            //$dealership->each->hours()->attach($hours);
            $time->addHour();
        }



        return redirect()->back();
    }


    public function show($id)
    {
        $dealership = dealership::where('id', $id)->first();
        return view('Dealership.show')->with('dealership', $dealership);
    }


    public function edit(dealership $dealership)
    {
        if((Auth::user()->type=='admin') || (Auth::user()->type=='employee' && Auth::user()->dealership_id==$dealership->id)){
            if ($dealership === null) {
                return redirect()->back();
            } else
                return view('Dealership.edit')->with('dealership', $dealership);
        }
    }


    public function update(Request $request, dealership $dealership)
    {
        //$dealership=dealership::find($id);
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'startTime' =>'required',
            'endTime' => 'required',
            'workdays' => 'required',
        ]);
        if ($request->has('dealer_photo_path')) {
            $photo = $request->file('dealer_photo_path');
            $newphoto = time() . $photo->getClientOriginalName();
            $photo->move('dealer/', $newphoto);
            $dealership->dealer_photo_path = 'dealer/' . $newphoto;
        }
        $dealership->name = $request->name;
        $dealership->location = $request->location;
        $dealership->phone = $request->phone;
        $dealership->startTime = $request->startTime;
        $dealership->endTime = $request->endTime;
        $dealership->workdays = $request->workdays;

        $dealership->save();
        $hours=$dealership->hour()->delete();
        // foreach($hours as $h){
        //         $h->destroy($h->id);
        // }

        $start=$request->startTime;
        $end=$request->endTime;

            $start_time = Carbon::parse($start)->format(' g:i a');
            $end_time = Carbon::parse($end)->format(' g:i a');
            $totalDuration =Carbon::parse($start_time)->diffInHours($end_time);
            $num=explode(" ",$totalDuration);
            $time = new Carbon($start_time);
        for( $i=0;$i<$num[0];$i++){
            $hours=Hours::create([
                'startTime'=>$time
            ]);
            $dealership->hour()->attach($hours);
            $time->addHour();
        }
        return redirect()->back();
    }


    public function destroy($id)
    {
        // public function destroy(dealership $dealership)
        // {
        //     dd($dealership->id);
        //     //$dealership=dealership::where('id',$id)->get();
        //     if($dealership===null){
        //         return redirect()->route('dealership.index');
        //     }
        //      else{
        //     $dealership->delete();
        //     return redirect()->back();
        // }}
        $dealership = dealership::find($id);
        $dealership->destroy($id);

        return redirect()->back();
    }
}
