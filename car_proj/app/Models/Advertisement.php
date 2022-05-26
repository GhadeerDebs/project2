<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dealership;
use App\Models\moodel;
use App\Models\Picture;
use App\Models\Equipment;
use App\Models\EN_Equipment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class Advertisement extends Model
{
    public $table = "advertisement";
    use HasFactory;
    protected $fillable = [
        'type', 'engine_capacity',    'engine_power', 'drivetrain',    'weight',    'gearbox',    'color',    'dealership_id', 'model_id' ,'entertainment_equipment','equipment'

    ];
    public function dealership(){

        return $this->belongsTo(dealership::class,'dealership_id','id');

   }
   public function model(){

    return $this->belongsTo(moodel::class,'model_id');

}
public function year(){

    return $this->belongsTo(moodel::class,'model_id')->get()->first()->year();

}
public function make(){

    return $this->belongsTo(moodel::class,'model_id')->get()->first()->make();

}
    public function pictures()
    {
        return $this->hasMany(Picture::class,'adv_id','id');
    }

    public function users_save()
    {

        return $this->belongsToMany(User::class, 'favorite');
    }
}
