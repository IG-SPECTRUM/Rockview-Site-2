<?php

namespace App\Models\global_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinceStation extends Model
{
    use HasFactory;
    protected $fillable = ["province_id","station","date"];
}
