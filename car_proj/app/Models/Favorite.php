<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;
class Favorite extends Model
{
    public $table = "favorite";
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id' , 'adv_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Advertisement::class);
    }
}
