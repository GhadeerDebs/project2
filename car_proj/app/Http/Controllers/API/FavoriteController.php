<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\AUTH;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Advertisement;



class FavoriteController extends Controller
{
    public function addAd2Favorite(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'adv_id' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $fav=Favorite::where('user_id','=', $request->user_id)->where('adv_id','=',$request->adv_id)->get();
        if($fav->isEmpty()){
            $favorite = Favorite::create([
                'user_id' => $request->user_id,
                'adv_id' => $request->adv_id,
            ]);
            return response()
        ->json(['data' => $favorite],201);


        }
        else {
            return response()
            ->json(['data' => 'the ad is alreay exist '],401);
    }}
    public function userFavoriteAds($user_id){
        $ads=Advertisement::join('favorite','favorite.adv_id','=','advertisement.id')
                        ->join('users','users.id','=','favorite.user_id')
                        ->where('favorite.user_id',$user_id)
                        ->get(['advertisement.*']);
        $data=collect();
        foreach($ads as $a){
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

    public function removeAdfromFavorite($userid,$adid){
        $fav=Favorite::where('user_id','=', $userid)->where('adv_id','=',$adid)->first();
       // $fav = Favorite::where('id', $id)->first();
        if ($fav === null) {
            return response()
            ->json(['data' => 'not found'],401);
        }
        $fav->delete();
        return response()
        ->json(['data' => 'deleted'],201);

    }

}
