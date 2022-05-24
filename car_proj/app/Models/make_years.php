<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\make;


class make_years extends Model
{
    use HasFactory;

    public $table = "make_years";
    protected $fillable =['	year','make_id'];
    public function make(){

         return $this->belongsTo(make::class);

    }
}
