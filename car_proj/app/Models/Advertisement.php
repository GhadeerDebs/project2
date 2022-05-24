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

class Advertisement extends Model
{
    public $table = "advertisement";
    use HasFactory;
    protected $fillable = [
        'type', 'engine_capacity',    'engine_power', 'drivetrain',    'weight',    'gearbox',    'color',    'dealership_id', 'model_id' ,'entertainment_equipment','equipment'

    ];
    public function dealership()
    {

        return $this->belongsTo(dealership::class);
    }
    public function model()
    {
        return $this->belongsTo(moodel::class);
    }
    public function pictures()
    {

        // return $this->hasMany(Picture::class)->join('Picture', 'advertisement.id', '=','Picture.adv_id')
        // ->select('Picture.advertisement_photo_path')->get()->unique('name');
        return $this->hasMany(Picture::class);
    }

    // public function Equipments()
    // {

    //     return $this->hasMany(Equipment::class);
    // }
    // public function EN_Equipments()
    // {

    //     return $this->hasMany(EN_Equipment::class);
    // }
    public function users_save()
    {

        return $this->belongsToMany(User::class, 'favorite');
    }
}
