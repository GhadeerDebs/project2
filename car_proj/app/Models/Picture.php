<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;


class Picture extends Model
{
    use HasFactory;
    public $table = "picture";
    protected $fillable = [
        'advertisement_photo_path', 'adv_id'
    ];
    public function Advertisement()
    {
        return $this->belongsTo('App\Models\Advertisement', 'adv_id', 'id');
    }
}
