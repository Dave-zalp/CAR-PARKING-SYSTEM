<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Parking_Space extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['Space_name','status','Bill_per_minute'];

}
