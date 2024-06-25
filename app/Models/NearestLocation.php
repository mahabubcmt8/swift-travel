<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NearestLocation extends Model
{
    use HasFactory;
     protected $fillable=[
        'status','location','slug'
    ];


    public function locations(){
        return $this->hasMany(PropertyNearestLocation::class);
    }
}
