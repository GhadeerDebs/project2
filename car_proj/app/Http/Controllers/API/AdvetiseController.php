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

 //$ads= Advertisement::with('pictures')->get();
// $data= DB::select('select advertisement.* , picture.advertisement_photo_path ,model.name as model_name, make_years.year as m_year, make.name as make_name
//                     from advertisement
//                     inner join picture on picture.adv_id = advertisement.id
//                     inner join model on advertisement.model_id = model.id
//                     inner join make_years on model.make_years_id = make_years.id
//                     inner join make on make_years.make_id = make.id');


//return AdsResource::collection($ads);


        $adv= Advertisement::all();
        $data=collect();
        foreach($adv as $a){
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
               // 'dealership_name'=>$dealer[0]['name'],
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
$ads =Advertisement::find($id);
if($ads){
    return response()->json($ads,200);

}

return response()->json('The Ads not Found',404);

    }




}
