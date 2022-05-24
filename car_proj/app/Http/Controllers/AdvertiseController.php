<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Livewire\MakeMakeyearsModelDropdown as livewire;
use App\Models\Advertisement as ad;
use Illuminate\Http\Request;
use App\Models\dealership;
use App\Models\moodel;
use App\Models\Picture;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire as LivewireLivewire;

class AdvertiseController extends Controller
{

    public function index()
    {
        $ads = ad::orderby('created_at', 'DESC')->get();
        $images=Picture::all();
        return view('ads.index')->with('ads', $ads)->with('images',$images);
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
       // dd($request->all());

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
           // 'advertisement_photo_path' => 'required|image'
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
            'entertainment_equipment'        => $request->entertainment_equipment,
            'equipment'        => $request->equipment


        ]);
      //  $gallery =  new Picture;
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
         // $gallery->advertisement_photo_path = implode(', ',$name);
        //    Picture::insert(
        //        ['advertisement_photo_path'=> $name,
        //          'adv_id' =>$ads->id
        //        ]
        //     );

        //   $gallery->save();



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
        $dealerships=dealership::all();
        $models=moodel::all();
        return view('ads.edit')->with('ads', $ads)->with('dealerships',$dealerships)->with('models', $models);
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
            'dealership_id'   => 'required'
          //  'advertisement_photo_path' =>'required'
            //'model_id'        =>'required'

        ]);

        if($request->has('model_id')){
            $ads->model_id        = $request->model_id;
            $ads->save();
        }

        $ads->type             = $request->type;
        $ads->engine_capacity = $request->engine_capacity;
        $ads->engine_power    = $request->engine_power;
        $ads->drivetrain      = $request->drivetrain;
        $ads->weight          = $request->weight;
        $ads->gearbox         = $request->gearbox;
        $ads->color          = $request->color;
        $ads->dealership_id   = $request->dealership_id;

        $ads->entertainment_equipment        = $request->entertainment_equipment ;
        $ads->equipment        = $request->equipment;
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
