<?php

namespace App\Models\global_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPagerImageSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        "heading",
        "description",
        "image"
    ];
}
