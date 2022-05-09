<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;
use App\Models\make_years;


class moodel extends Models
{
    use HasFactory;
     public $table = "model";

      public function years(){
          return $this->hasMany(make_years::class)->select('year');
    }
      public function make(){
          return $this->hasMany(make_years::class)->select('make')->limit(1);
    }
     public function advertisement(){
          return $this->hasMany(Advertisement::class);
    }
    
}
