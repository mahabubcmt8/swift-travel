<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class City extends Model
{
    use HasFactory;
    protected $fillable=[
        'country_state_id','name','slug','status'
    ];


    public function countryState(){
        return $this->belongsTo(CountryState::class);
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }
}
