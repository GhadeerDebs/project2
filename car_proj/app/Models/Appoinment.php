<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dealership;
use App\Models\User;

class Appoinment extends Model
{
    use HasFactory;
    public $table = "appoinement";


    public function dealership(){

         return $this->belongsTo(dealership::class);

    }
    public function user(){

         return $this->belongsTo(User::class);

    }
}
