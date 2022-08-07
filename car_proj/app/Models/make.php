<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\make_years;


class make extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "make";
    protected $fillable = ['name'];
    public function models()
    {
        return $this->hasMany(make_years::class, 'make_id', 'id');
        //       return $this->hasMany(make_years::class)->join('model', 'make_years.id', '=','model.make_years_id')
        //       ->select('model.name')->get()->unique('name');
        // }
    }
}
