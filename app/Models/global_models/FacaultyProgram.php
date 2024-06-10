<?php

namespace App\Models\global_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacaultyProgram extends Model
{
    use HasFactory;

    protected $fillable = ["program_id","facaulty_id"];

    public function program(){
        return $this->belongsTo(Program::class);
    }
}
