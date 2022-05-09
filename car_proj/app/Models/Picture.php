<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;


class Picture extends Model
{
    use HasFactory;
         public $table = "picture";

     public function Advertisement(){
         return $this->belongsTo(Advertisement::class);
    }
}
