<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hours;
use App\Models\dealership;
use App\Models\User;
use App\Models\Appoinment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Mail\NotifyMail;
use App\Models\dealership_time;

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
        $app=Appoinment::find($id);
            $dealership=dealership::find( Auth::user()->dealership_id);
            $contains = str_contains($dealership->workdays, date('w') );
            if($contains != null){
            $hours=$dealership->time()->get();
            $data=collect();
            foreach($hours as $h){
                if($h->status=='false'){
                $start = Carbon::parse($h->startTime)->format("H:i:s");
                   // $start= Carbon::createFromFormat('g:i a', $h->startTime);
                    $cuurent=Carbon::now()->setTimezone("GMT+3")->format("H:i:s");
                    // echo "current : ".$cuurent."------- start :".$start ;
                    // echo "<br>";
                    if( Carbon::parse($start)->gt($cuurent) ){
                       // echo "OK_____";
                        $timestamp = strtotime($h->startTime ) + ($dealership->duration)*60;
                        $start_time = Carbon::parse($h->startTime)->format(' g:i a');
                        $endtime = date('g:i a', $timestamp);
                        $data->push([
                            'id' => $h->id,
                            'startTime' =>$start_time,
                            'endTime' => $endtime ,
                            'user' => $app->user_id,
                            'status' => $h->status,
                        ]);
                    }
                }}
             //   dd($hours);

            return view('appointment.edit')->with('appointment',$app)->with('hours',$data);
        }else{
            return "Day off";
        }


            }

    public function update(Request $request, $id)
    {

        $user1=User::where('id',$request->user)->first();
        $app=Appoinment::find($id);
        $oldstart=Carbon::parse($app->start_time)->format(' H:i:s'); //19
        $this->validate($request,[
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        //save new appointment time
        $start_time = Carbon::parse($request->start_time)->format(' H:i:s');
        $end_time = Carbon::parse($request->end_time)->format(' H:i:s');
        $app->start_time=$start_time;
        $app->end_time=$end_time;
        $app->save();

        //book new hour

        $hour=dealership_time::whereTime('startTime', $start_time)->first();
        //dd($hour);
        $hour->status='true';

        $hour->save();
        //dd($hour);

        $hour23=dealership_time::whereTime('startTime',$oldstart)->first();
               //  $oldhour=Hours::find($hourid->first()->id);
                 $hour23->status='false';
              //    echo $hourid
                $hour23->save();
                //email
                $uid=$user1->id;

                Mail::to($user1->email)->send(new NotifyMail($uid));

                if (Mail::failures()) {
                     return 'Sorry! Please try again latter';
                }else{
                     return 'Great! Successfully send in your mail';
                   }

    }

    public function destroy($id)
    {
        $app = Appoinment::find($id);
        $app->destroy($id);

        return redirect()->back();

    }
}
