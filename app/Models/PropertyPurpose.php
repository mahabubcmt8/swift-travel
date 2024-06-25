<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPurpose extends Model
{
    use HasFactory;
    protected $fillable=[
        'purpose','status','slug'
    ];
}
