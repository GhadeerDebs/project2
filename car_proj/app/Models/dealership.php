<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Advertisement;
use App\Models\Appoinment;
use Carbon\Carbon;

class dealership extends Model
{
    use HasFactory;

    public $table = "dealership";
    protected $fillable = [
        'name', 'location', 'phone', "dealer_photo_path", 'startTime', 'endTime', 'workdays'
    ];

    public function employees()
    {

        return $this->hasMany(User::class);
    }
    public function Advertisements()
    {

        return $this->hasMany(Advertisement::class);
    }
    public function appoinments()
    {
        return $this->hasMany(Appoinment::class);
    }
    public function hour()
    {
        return $this->belongsToMany(Hours::class, 'dealership_hour', 'dealership_id', 'hour_id');
    }
    public function hours()
    {
        return $this->belongsToMany(Hours::class, 'dealership_hour', 'dealership_id', 'hour_id')->where('status', '=', 'false')->get();
    }

}
