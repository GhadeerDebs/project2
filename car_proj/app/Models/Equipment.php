<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;


class Equipment extends Model
{
    use HasFactory;
     public $table = "equipment";

     public function Advertisement(){
         return $this->belongsTo(Advertisement::class);
    }

}
