<?php

namespace App\Http\Controllers;

use App\Models\Advertisement as ad;
use Illuminate\Http\Request;
use App\Models\dealership;
use App\Models\moodel;
use App\Models\Picture;
use Storage;
use Illuminate\Support\Facades\Auth;
class AdvertiseController extends Controller
{


    public function index()
    {
        $user=Auth::user();
        $dealerID=$user->dealership_id;
        $type=$user->type;
        if($type=='employee'){
            $ads = ad::orderby('created_at', 'DESC')->where('dealership_id',$dealerID)->get();
        }else{
        $ads = ad::orderby('created_at', 'DESC')->get();
        }
        $images=Picture::all();
        return view('ads.index')->with('ads', $ads)->with('images',$images);
    }



    public function create()
    {
        $dealerships=dealership::all();
        $models=moodel::all();
        return view('ads.create')->with('dealerships',$dealerships)->with('models',$models);
    }

    public function store(Request $request)
    {


        if(Auth::user()->type=='admin'){
            $this->validate($request, [
                'type'            => 'required',
                'engine_capacity' => 'required',
                'engine_power'    => 'required',
                'drivetrain'      => 'required',
                'weight'          => 'required',
                'gearbox'         => 'required',
                'color'           => 'required',
                'dealership_id'   => 'required',
                'model_id'        => 'required'
                //'advertisement_photo_path' => 'required|image'
            ]);
        $ads = ad::create([
            'type'            => $request->type,
            'engine_capacity' => $request->engine_capacity,
            'engine_power'    => $request->engine_power,
            'drivetrain'      => $request->drivetrain,
            'weight'          => $request->weight,
            'gearbox'         => $request->gearbox,
            'color'           => $request->color,
            'dealership_id'   => $request->dealership_id,
            'model_id'        => $request->model_id,


        ]);}
        if(Auth::user()->type=='employee'){
            $this->validate($request, [
                'type'            => 'required',
                'engine_capacity' => 'required',
                'engine_power'    => 'required',
                'drivetrain'      => 'required',
                'weight'          => 'required',
                'gearbox'         => 'required',
                'color'           => 'required',
                'model_id'        => 'required'
                //'advertisement_photo_path' => 'required|image'
            ]);
            $ads = ad::create([
                'type'            => $request->type,
                'engine_capacity' => $request->engine_capacity,
                'engine_power'    => $request->engine_power,
                'drivetrain'      => $request->drivetrain,
                'weight'          => $request->weight,
                'gearbox'         => $request->gearbox,
                'color'           => $request->color,
                'dealership_id'   => Auth::user()->dealership_id,
                'model_id'        => $request->model_id,


            ]);
        }

        foreach( $request->file('advertisement_photo_path') as $image)
          {
            $upload_image_name = time().$image->getClientOriginalName();
            $image->move('adss', $upload_image_name);
            $name = $upload_image_name;
            $imgs=Picture::create(
                [
                 'adv_id' =>$ads->id,
                    'advertisement_photo_path'=>'adss/'.$name

                ]
             );
          }

        return redirect()->back();
    }

    public function show(ad $ads)
    {
        $ads = ad::where('id', $ads->id)->first();
        $images=Picture::all();
        return view('ads.show')->with('ads', $ads)->with('images',$images);
    }


    public function edit(ad $ads)
    {

        $ads = ad::where('id', $ads->id)->first();
        if(Auth::user()->type=='employee' && Auth::user()->dealership_id==$ads->dealership_id){
            if ($ads === null) {
                return redirect()->back();
            }
            return view('ads.edit')->with('ads', $ads);
        }
        if(Auth::user()->type=='admin'){
            $dealerships=dealership::all();
            if ($ads === null) {
                return redirect()->back();
            }
            return view('ads.edit')->with('ads', $ads)->with('dealerships',$dealerships);
        }

    }


    public function update(Request $request, ad $ads)
    {
        $ads = ad::find($ads->id);
        if(Auth::user()->type=='admin'){
            $this->validate($request, [
                'type'            => 'required',
                'engine_capacity' => 'required',
                'engine_power'    => 'required',
                'drivetrain'      => 'required',
                'weight'          => 'required',
                'gearbox'         => 'required',
                'color'           => 'required',
                'dealership_id'   => 'required',
              //  'advertisement_photo_path' =>'required'
                //'model_id'        =>'required'

            ]);
            $ads->dealership_id   = $request->dealership_id;
        }
        if(Auth::user()->type=='employee'){
            $this->validate($request, [
                'type'            => 'required',
                'engine_capacity' => 'required',
                'engine_power'    => 'required',
                'drivetrain'      => 'required',
                'weight'          => 'required',
                'gearbox'         => 'required',
                'color'           => 'required'
              //  'advertisement_photo_path' =>'required'
                //'model_id'        =>'required'

            ]);
            $ads->dealership_id   = Auth::user()->dealership_id;
        }




        $ads->type             = $request->type;
        $ads->engine_capacity = $request->engine_capacity;
        $ads->engine_power    = $request->engine_power;
        $ads->drivetrain      = $request->drivetrain;
        $ads->weight          = $request->weight;
        $ads->gearbox         = $request->gearbox;
        $ads->color          = $request->color;
        if($request->has('model_id')){
        $ads->model_id        = $request->model_id;
        }
        $ads->save();
        return redirect()->back();
    }


    public function destroy(ad $ads)
    {
        //
        $ads = ad::where('id', $ads->id)->first();
        if ($ads === null) {
            return redirect()->back();
        }
        $ads->delete();
        return redirect()->back();
    }
}
