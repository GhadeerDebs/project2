<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;

class EN_Equipment extends Model
{
    use HasFactory;
   
     public $table = " entertainment_equipment";

     public function Advertisement(){
         return $this->belongsTo(Advertisement::class);
    }
}
