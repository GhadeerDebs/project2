<?php

namespace App\Http\Controllers;

use App\Models\dealership;
use App\Models\Advertisement;
use App\Models\Appoinment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\emaildelete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\dealership_time;
use Illuminate\Support\Arr;
class dealership_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  $dealerships = dealership::all();
        $dealerships = dealership::paginate(2);
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
            'workdays' =>'required',
            'duration' =>'required'
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
            'workdays' =>json_encode($days),
            'duration'=>intval($request->duration )
        ]);





        $start=$request->startTime;
        $end=$request->endTime;

            $start_time = Carbon::parse($start)->format(' g:i a');
            $end_time = Carbon::parse($end)->format(' g:i a');
            $totalDuration =Carbon::parse($start_time)->diffInMinutes($end_time);
            $num=explode(" ",$totalDuration);
            $num1=$num[0]/intval($request->duration );

            $time = new Carbon($start_time);
        for( $i=0;$i<$num1;$i++){
            dealership_time::create([
                'startTime'=>$time,
                'dealership_id'=>$dealership->id,
                'status'=>"false"
            ]);
            $time->addMinutes(intval($request->duration ));

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
       // $dealership0=dealership::find($dealership);
       $oldStartTime=Carbon::parse($dealership->startTime)->format(' H:i:s'); //19
        $oldEndTime=Carbon::parse($dealership->endTime)->format(' H:i:s'); //19
       $oldDuration= $dealership->duration ;
     //   echo $oldDuration . " iiii" . $oldEndTime." oooo".$oldStartTime;
        $days = array(
            'workdays' => $request->workdays,
        );
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'workdays' =>'required',
            'duration' =>'required'
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
        $dealership->workdays = json_encode($days);
        $dealership->duration =intval($request->duration );
        $dealership->save();



       //$dealership=dealership::find(Auth::user()->dealership_id);
        //$dealership_time = $dealership->time();
       $time = Carbon::now()->setTimezone("GMT+3");

       $afterhour=$time->addMinutes(60);

       // $todayRestAppointment=  --->where today   ///   rest after now +60m  /// sort start time
       $todayRestAppointment=Appoinment::where('dealership_id',Auth::user()->dealership_id )
                                       ->whereDate('appoinment_date', '=', Carbon::now()->setTimezone("GMT+3")->format('Y-m-d'))
                                       ->whereTime('start_time','>=',$afterhour)
                                       ->get()->sortBy('start_time');



//dd($todayRestAppointment);
        // update dealership time(delete--->create)

        $dealership->time()->delete();




        $start=$request->startTime;
        $end=$request->endTime;

            $start_time = Carbon::parse($start)->format(' g:i a');
            $end_time = Carbon::parse($end)->format(' g:i a');
            $totalDuration =Carbon::parse($start_time)->diffInMinutes($end_time);
            $num=explode(" ",$totalDuration);
            $num1=$num[0]/intval($request->duration );

            $time = new Carbon($start_time);

        for( $i=0;$i<$num1;$i++){
            dealership_time::create([
                'startTime'=>$time,
                'dealership_id'=>$dealership->id,
                'status'=>"false"

            ]);
            $time->addMinutes(intval($request->duration ));

        }
        ///////////////////////////////////



    //   $date2 = Carbon::createFromFormat('H:i',$dealership->startTime );
    //   $date3 = Carbon::createFromFormat('H:i',$dealership->endTime );


$date22= Carbon::parse( $dealership->startTime)->format(' H:i:s');


      if($todayRestAppointment!=null &&(
        $oldDuration != $dealership->duration) ||
        Carbon::parse($oldStartTime)->ne($date22)||
        Carbon::parse($oldEndTime)->ne($dealership->endTime)
     ){
        foreach($todayRestAppointment as $appointment)
            {
               $app= Appoinment::find($appointment->id);
                $user=User::where('id',$app->user_id)->first();
                $uid=$user->id;
                Appoinment::find($appointment->id)->delete();
                Mail::to($user->email)->send(new emaildelete($uid));

                if (Mail::failures()) {
                     return 'Sorry! Please try again latter';
                }else{
                     return 'Great! Successfully send in your mail';
                   }


             }
     }else{
        echo " no changing ";
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
