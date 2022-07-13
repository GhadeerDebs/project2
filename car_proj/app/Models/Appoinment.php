<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dealership;
use App\Models\User;

class Appoinment extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "appoinement";

    protected $fillable=[
        'start_time' , 'end_time' , 'appoinment_date' , "dealership_id" ,'user_id'
    ];

    public function dealership(){

         return $this->belongsTo(dealership::class);

    }
    public function user(){

         return $this->belongsTo(User::class);

    }
}
