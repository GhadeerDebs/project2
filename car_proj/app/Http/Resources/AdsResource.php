<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
// "id": 62,
// "type": "Sedan",
// "engine_capacity": 3000,
// "engine_power": 1233,
// "drivetrain": "frontWHeelDrive",
// "weight": 2800,
// "gearbox": "automatic",
// "color": "red",
// "created_at": "2022-05-23T17:25:16.000000Z",
// "updated_at": "2022-05-23T17:25:16.000000Z",
// "dealership_id": 1,
// "model_id": 11577,
// "equipment": null,
// "entertainment_equipment": null,
// "pictures": [
//     {
//         "id": 6,
//         "advertisement_photo_path": "adss/16533267167a0f4226-9ebc-4b62-a083-78855b9e2080.jpg",
//         "created_at": "2022-05-23T17:25:16.000000Z",
//         "updated_at": "2022-05-23T17:25:16.000000Z",
//         "adv_id": 62
//     }
// ],
// "model": {
//     "id": 11577,
//     "name": "1125CR",
//     "make_years_id": 550
// }




        return parent::toArray($request);

    }}


