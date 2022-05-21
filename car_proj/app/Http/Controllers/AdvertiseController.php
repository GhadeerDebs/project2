<?php

namespace App\Http\Controllers;

use App\Models\Advertisement as ad;
use Illuminate\Http\Request;
use App\Models\dealership;
use App\Models\moodel;
use App\Models\Picture;
use Storage;
class AdvertiseController extends Controller
{

    public function index()
    {
        $ads = ad::orderby('created_at', 'DESC')->get();
        return view('ads.index')->with('ads', $ads);
    }



    public function create()
    {
        $dealerships=dealership::all();
        $models=moodel::all();
        return view('ads.create')->with('dealerships',$dealerships)->with('models',$models);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'type'            => 'required',
            'engine_capacity' => 'required',
            'engine_power'    => 'required',
            'drivetrain'      => 'required',
            'weight'          => 'required',
            'gearbox'         => 'required',
            'color'           => 'required',
            'dealership_id'   => 'required',
            'model_id'        => 'required',
            'advertisement_photo_path' => 'required|image'
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


        ]);
        foreach ($request->advertisement_photo_path as $imagefile) {
        //     $newphoto = time().$imagefile->getClientOriginalName();
        //     $imagefile->move('dealer',$newphoto);
        //     // $image->advertisement_photo_path = $path;
        //     // $image->adv_id = $ads->id;
        //     $image=Picture::create([
        //         'advertisement_photo_path' =>'dealer/'.$newphoto,
        //         'adv_id'=>$ads->id
        //     ]);
        //    // $image->save();
        $tests = new Picture([
            'advertisement_photo_path' => $imagefile['advertisement_photo_path'],
            'adv_id' => $ads->id

        ]);
        $tests->save();
        //    if($tests->id==1){
        //     return   view('dealership.create');
        //    }
        }
        return redirect()->back();
    }

    public function show(ad $ads)
    {
        $ads = ad::where('id', $ads->id)->first();
        return view('ads.show')->with('ads', $ads);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function edit(ad $ads)
    {
        //
        $ads = ad::where('id', $ads->id)->first();
        if ($ads === null) {
            return redirect()->back();
        }
        return view('ads.edit')->with('ads', $ads);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ad $ads)
    {
        //
        $ads = ad::find($ads->id);
        $this->validate($request, [
            'type'            => 'required',
            'engine_capacity' => 'required',
            'engine_power'    => 'required',
            'drivetrain'      => 'required',
            'weight'          => 'required',
            'gearbox'         => 'required',
            'color'           => 'required',
            'dealership_id'   => 'required',
            'model_id'        =>'required'

        ]);


        $ads->type             = $request->type;
        $ads->engine_capacity = $request->engine_capacity;
        $ads->engine_power    = $request->engine_power;
        $ads->drivetrain      = $request->drivetrain;
        $ads->weight          = $request->weight;
        $ads->gearbox         = $request->gearbox;
        $ads->color          = $request->color;
        $ads->dealership_id   = $request->dealership_id;
        $ads->model_id        = $request->model_id;
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
