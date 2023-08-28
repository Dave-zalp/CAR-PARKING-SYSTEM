<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking_Space extends Model
{
    use HasFactory;

    protected $fillable = ['Address','status','bill_per_min'];
    
}
