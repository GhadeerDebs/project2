<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Advertisement;
use App\Models\Appoinment;
use App\Models\dealership_time;

use Carbon\Carbon;

class dealership extends Model
{
    use HasFactory;

    public $table = "dealership";
    protected $fillable = [
        'name', 'location', 'phone', "dealer_photo_path", 'startTime', 'endTime', 'workdays','duration'
    ];

    public function employees()
    {

        return $this->hasMany(User::class);
    }
      public function time()
    {

        return $this->hasMany(dealership_time::class);
    }
    // public function timef()
    // {

    //     return $this->hasMany(dealership_time::class)->where('status','false');
    // }
    public function Advertisements()
    {

        return $this->hasMany(Advertisement::class,'dealership_id','id');
    }
    public function appoinments()
    {
        return $this->hasMany(Appoinment::class);
    }
}
