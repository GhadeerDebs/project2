<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\make;
use App\Models\moodel;


class make_years extends Model
{
    use HasFactory;
<<<<<<< HEAD
    public $table = "make_years";
=======
    public $timestamps = false;
    public $table = "make_years";



>>>>>>> d7cc5dd440cca82d89f2ef44669893cb05d3933d
    protected $fillable = ['year', 'make_id'];
    public function make()
    {
        return $this->belongsTo(make::class, 'make_id', 'id')->get();
    }
}
