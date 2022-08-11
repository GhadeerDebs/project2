<?php

namespace App\Http\Controllers;

use App\Models\Advertisement as ad;
use Illuminate\Http\Request;
use App\Models\dealership;
use App\Models\moodel;
use App\Models\Picture;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Exception;
use Storage;
use Illuminate\Support\Facades\Auth;

class AdvertiseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dealerID = $user->dealership_id;
        $type = $user->type;
        if ($type == 'employee') {
            $ads = ad::orderby('created_at', 'DESC')->where('dealership_id', $dealerID)->get();
        } else {
            $ads = ad::orderby('created_at', 'DESC')->get();
        }
        $images = Picture::all();
        return view('ads.index')->with('ads', $ads)->with('images', $images);
    }




    public function create()
    {
        $dealerships = dealership::all();
        $models = moodel::all();
        return view('ads.create')->with('dealerships', $dealerships)->with('models', $models);
    }
    public function store(Request $request)
    {

        $user = Auth::user();
        $dealerID = $user->dealership_id;
        $type = $user->type;
        if ($type == 'employee') {
            $this->validate($request, [
                'type'            => 'required',
                'engine_capacity' => 'required',
                'engine_power'    => 'required',
                'drivetrain'      => 'required',
                'weight'          => 'required',
                'gearbox'         => 'required',
                'color'           => 'required',
                'model_id'        => 'required',
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
                'dealership_id'   => $dealerID,
                'model_id'        => $request->model_id
            ]);
        }
        if ($type == 'admin') {
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
                'model_id'        => $request->model_id

            ]);
        }

        $gallery = $request->file('advertisement_photo_path');
        //   dd($gallery);
        if(isset($gallery)){
        foreach ($request->file('advertisement_photo_path') as $image) {
            $upload_image_name = time() . $image->getClientOriginalName();
            $image->move('adss', $upload_image_name);
            $name = $upload_image_name;
            $image = Picture::create(
                [
                    'adv_id' => $ads->id,
                    'advertisement_photo_path' => 'adss/' . $name

                ]
            );
        }
    }
        return redirect()->back();
    }





    public function show(ad $ads)
    {
        $ads = ad::where('id', $ads->id)->first();
        $images = Picture::all();
        return view('ads.show')->with('ads', $ads)->with('images', $images);
    }


    public function edit(ad $ads)
    {

        $ads = ad::where('id', $ads->id)->first();
        $images = Picture::all();
        $dealership = dealership::all();
        $models = moodel::all();
        return view('ads.edit')->with('ads', $ads)->with('dealerships', $dealership)->with('images', $images)->with('models', $models);
    }

    public function update(ad $ads, Request $request)
    {

        $ads = ad::find($ads->id);
        $user = Auth::user();
        $dealerID = $user->dealership_id;
        $type = $user->type;
        if ($type == 'employee') {
             $this->validate($request, [
            'type'            => 'required',
            'engine_capacity' => 'required',
            'engine_power'    => 'required',
            'drivetrain'      => 'required',
            'weight'          => 'required',
            'gearbox'         => 'required',
            'color'           => 'required',
            'model_id'        => 'required',
        ]);
        $ads->dealership_id = $dealerID;}
        if ($type == 'admin') {
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
        ]);
        $ads->dealership_id =$request->dealership_id;
    }


        $ads->type             = $request->type;
        $ads->engine_capacity = $request->engine_capacity;
        $ads->engine_power    = $request->engine_power;
        $ads->drivetrain      = $request->drivetrain;
        $ads->weight          = $request->weight;
        $ads->gearbox         = $request->gearbox;
        $ads->color          = $request->color;

        $ads->equipment       = $request->equipment;
        $ads->entertainment_equipment = $request->entertainment_equipment;
            $ads->model_id        = $request->model_id;

            if ($request->hasFile("advertisement_photo_path")) {
                foreach ($request->file('advertisement_photo_path') as $image) {
                    $upload_image_name = time() . $image->getClientOriginalName();
                    $image->move('adss', $upload_image_name);
                    $name = $upload_image_name;
                    $image = Picture::create(
                        [
                            'adv_id' => $ads->id,
                            'advertisement_photo_path' => 'adss/' . $name

                        ]
                    );
                }
            }
            $ads->save();

            return redirect('ads');
        }

    public function deleteimage($id)
    {
        $images = Picture::findOrFail($id);
        if (File::exists("adss/" . $images->advertisement_photo_path)) {
            File::delete("adss/" . $images->advertisement_photo_path);
        }

        Picture::find($id)->delete();
        return back();
    }




    public function destroy($id)
    {
        $ads = ad::findOrFail($id);


        $images = Picture::where("adv_id", $ads->id)->get();
        foreach ($images as $image) {
            if (File::exists("adss/" . $image->advertisement_photo_path)) {
                File::delete("images/" . $image->advertisement_photo_path);
            }
        }
        $ads->delete();
        return back();
    }
}



    // public function destroy($id)
    // {
    //     //
    //     $ads = ad::where('id', $id)->first();
    //     if ($ads === null) {
    //         return redirect()->back();
    //     }
    //     $ads->delete();
    //     return redirect()->back();
    // }

    // {{-- $ads=ad::findOrFail($id);
    //
    //        $ad->update([
    //            $ads->type             = $request->type;
    // $ads->engine_capacity = $request->engine_capacity;
    // $ads->engine_power    = $request->engine_power;
    // $ads->drivetrain      = $request->drivetrain;
    // $ads->weight          = $request->weight;
    // $ads->gearbox         = $request->gearbox;
    // $ads->color          = $request->color;
    // $ads->dealership_id   = $request->dealership_id;
    // $ads->model_id        = $request->model_id;
    //        ]);

    //        if($request->hasFile("pictures")){
    //            $files=$request->file("pictures");
    //            foreach($files as $file){
    //                $imageName=time().'_'.$file->getClientOriginalName();
    //                $request["adv_id"]=$id;
    //                $request["advertisement_photo_path"]=$imageName;
    //                $file->move(\public_path("adss"),$imageName);
    //                Picture::create($request->all()); --}}






    // public function destroy($id)
    // {
    //      $ads=Advertisement::findOrFail($id);

    //
    //      $images=Picture::where("adv_id",$ads->id)->get();
    //      foreach($images as $image){
    //      if (File::exists("adss/".$image->image)) {
    //         File::delete("images/".$image->image);
    //     }
    //      }
    //      $adss->delete();
    //      return back();
