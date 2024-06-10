<?php

namespace App\Models\global_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteHomePageCouse extends Model
{
    use HasFactory;
    protected $fillable = [
        "course",
        "image"
    ];
}
