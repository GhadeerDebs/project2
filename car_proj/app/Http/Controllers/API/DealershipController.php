<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\dealership;
use App\Models\Advertisement;

class DealershipController extends Controller{
    public function index(){
        $dealers= dealership::all();
        return response()->json([
            'data '=>$dealers
            ],210);
    }
    public function show($id){

        $adv= Advertisement::all()->where('dealership_id',$id);
        $data=collect();
        foreach($adv as $a){
            $model=$a->model()->get('name');
            $year=$a->year();
            $make=$a->make();
            $dealer=$a->dealership()->get('name');
            $data->push([
                'id '=> $a->id,
                'type'=>$a->type,
                'engine_capacity' =>$a->engine_capacity,
                'engine_power' =>$a->engine_power,
                'drivetrain' =>$a->drivetrain,
                'weight' =>$a->weight,
                'gearbox' =>$a->gearbox,
                'color' =>$a->color,
                'created_at'=>$a->created_at,
                'updated_at'=>$a->updated_at,
                'dealership_id'=>$a->dealership_id,
                'dealership_name'=>$dealer[0]['name'],
                'equipment' => $a->equipment,
                'entertainment_equipment' =>$a->entertainment_equipment,
                'model' => $model[0]['name'],
                'year' =>$year[0]['year'],
                'make' => $make[0]['name'],
                'pictures' =>$a->pictures()->get()
            ]);
        }

return response()->json([
'data '=>$data
],210);
    }
}
