<?php

namespace App\Http\Controllers;

use App\Models\dealership;
use Illuminate\Http\Request;

class dealership_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dealerships=dealership::all();
        return view('dealership.index', ['dealerships'=>$dealerships]);

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
        $this->validate($request,[
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'dealer_photo_path' => 'required|image'
        ]);
        $photo =  $request->file('dealer_photo_path');
        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('dealer',$newphoto);
        $dealership = dealership::create([
            'name' => $request->name,
            'location' => $request->location,
            'phone' => $request->phone,
            'dealer_photo_path' => 'dealer/'. $newphoto

        ]);
        return redirect()->back();
    }


    public function show($id)
    {
       $dealership=dealership::where('id',$id)->first();
       return view('Dealership.show')->with('dealership',$dealership);
    }


    public function edit(dealership $dealership)
    {


      //  $dealership=dealership::where('id',$this->id);
      //  $dealership=dealership::where('id',$dealership->id)->first();
        if($dealership===null){
            return redirect()->back();
        }else
        return view('Dealership.edit')->with('dealership',$dealership);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dealership  $dealership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,dealership $dealership)
    {
        //$dealership=dealership::find($id);
        $this->validate($request,[
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
        ]);
        if($request->has('dealer_photo_path')){
            $photo = $request->file('dealer_photo_path');
            $newphoto = time().$photo->getClientOriginalName();
            $photo->move('dealer/',$newphoto);
            $dealership->dealer_photo_path='dealer/'. $newphoto;
        }
        $dealership->name=$request->name;
        $dealership->location=$request->location;
        $dealership->phone=$request->phone;
        $dealership->save();
        return redirect()->back();
    }


    public function destroy(dealership $dealership)
    {
        dd($dealership->id);
        //$dealership=dealership::where('id',$id)->get();
        if($dealership===null){
            return redirect()->route('dealership.index');
        }
         else{
        $dealership->delete();
        return redirect()->back();
    }}
}
