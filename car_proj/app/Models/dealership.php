<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Advertisement;
use App\Models\Appoinment;
class dealership extends Model
{
    use HasFactory;
    
    public $table = "dealership";

    public function employees(){

          return $this->hasMany(User::class);
    
    }
    public function Advertisements(){

          return $this->hasMany(Advertisement::class);
    
    }
     public function appoinments(){
          return $this->hasMany(Appoinment::class);
    }

}
