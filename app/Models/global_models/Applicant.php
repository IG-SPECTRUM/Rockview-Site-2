<?php

namespace App\Models\global_models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "country",
        "phone_number",
        "email",
        "year",
        "intake",
        "mode_of_study",
        "level_of_education",
        "results_description",
        "national_id",
        "student_id",
        "status",
        "transaction_id",
        "program_id",
        "image"
    ];
}
