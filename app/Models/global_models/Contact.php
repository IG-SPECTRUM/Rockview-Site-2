<?php

namespace App\Models\global_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone_number",
        "subject",
        "message",
    ];
}
