<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dealership;
use App\Models\moodel;
use App\Models\Picture;
use App\Models\Equipment;
use App\Models\EN_Equipment;

class Advertisement extends Model
{
    public $table = "advertisement";
    use HasFactory;

    public function dealership(){
        
         return $this->belongsTo(dealership::class);
    }
    public function model(){

         return $this->belongsTo(moodel::class);
    }
    public function pictures(){

          return $this->hasMany(Picture::class);
    }
    public function Equipments(){

          return $this->hasMany(Equipment::class);
    }
    public function EN_Equipments(){

          return $this->hasMany(EN_Equipment::class);
    }


    
    
}
