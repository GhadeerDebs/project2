<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
    use HasFactory;
    public $table = "Hours";
    protected $fillable=[
        'startTime' ,'status'
    ];

    public function dealership()
    {
        return $this->belongsToMany(dealership::class,'dealership_hour','hour_id','dealership_id');
    }
}
