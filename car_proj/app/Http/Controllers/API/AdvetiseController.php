<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\make_years;

use App\Http\Resources\AdsResource;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;
use App\Models\moodel;
class AdvetiseController extends Controller
{

 public function index()
    {
        $adv= Advertisement::all();
        $data=collect();
        foreach($adv as $a){
            $model=$a->model()->get('name');
            $year=$a->year();
            $make=$a->make();
            $dealer=$a->dealership()->get('name');
            $dealer=$a->dealership()->get('phone');
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
                'dealership_phone'=>$dealer[0]['phone'],
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

//->

    public function show($id)
    {
        //
$a =Advertisement::find($id);
if($a){
    // return response()->json($ads,200);
    $data=collect();

        $model=$a->model()->get('name');
        $year=$a->year();
        $make=$a->make();
        $dealer=$a->dealership()->get('name');
       // $pictures[]=$a->pictures()->get();
   //   $pictures=$a->pictures()->get();
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
            'dealership_phone'=>$dealer[0]['phone'],
            'equipment' => $a->equipment,
            'entertainment_equipment' =>$a->entertainment_equipment,
            'model' => $model[0]['name'],
            'year' =>$year[0]['year'],
            'make' => $make[0]['name'],
            'pictures' =>$a->pictures()->get()
        ]);


return response()->json([
'data '=>$data
],210);

}

return response()->json('The Ads not Found',404);

    }




}
