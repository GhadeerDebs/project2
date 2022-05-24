<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Resources\AdsResource;

class AdvetiseController extends Controller
{

    public function index()
    {
        //
        $ads = AdsResource::collection(Advertisement::get());
return $this->sendResponse($ads,'successfully');

}



    public function show($id)
    {
        //
$ads =Advertisement::find($id);
if($ads){
    return $this->sendResponse($ads,'advertise send successfully');

}

return $this->sendError('The Advertisement not Found',[],404);

    }




}
