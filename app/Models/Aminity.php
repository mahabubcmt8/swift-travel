<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aminity extends Model
{
    use HasFactory;
    protected $fillable=[
        'aminity','icon','status','slug'
    ];



    public function propertyAminities(){
        return $this->hasMany(PropertyAminity::class);
    }
}
