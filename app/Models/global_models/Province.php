<?php

namespace App\Models\global_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    //======== Targeted districts ==============
    public function province_station(){
        return $this->hasMany(ProvinceStation::class);
    }
}
