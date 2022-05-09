<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}
