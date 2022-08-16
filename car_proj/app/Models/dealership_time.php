<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealership_time extends Model
{
    use HasFactory;

     public $table = "dealership_time";
    protected $fillable = [
        'id ', 'dealership_id', 'startTime', 'status'
    ];
      public function dealership()
    {

        return $this->belongsTo(dealership::class);
    }

}
