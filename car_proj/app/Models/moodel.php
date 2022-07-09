<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;
use App\Models\make_years;
use Illuminate\Support\Facades\DB;

class moodel extends Model
{
    use HasFactory;

    public $table = "model";
    protected $fillable = ['name', 'make_years_id'];

    public function year()
    {

        return $this->belongsTo(make_years::class, 'make_years_id', 'id')->select('year')->get();
    }
    public function years()
    {

        return model::where('name', $this->name)->select('make_years_id')->join('make_years', 'make_years.id', '=', 'make_years_id')
            ->select('make_years.year')->get();
    }
    public function make()
    {

        return $this->belongsTo(make_years::class, 'make_years_id', 'id')->get()->first()->make();
    }
    public function advertisement()
    {
        return $this->hasMany(Advertisement::class)->get();
    }
}
