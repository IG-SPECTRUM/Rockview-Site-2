<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("country");
            $table->string("phone_number");
            $table->string("email");
            $table->string("year");
            $table->string("intake");
            $table->string("mode_of_study");
            $table->string("level_of_education");
            $table->longText("results_description");
            $table->string("national_id");
            $table->string("student_id");
            $table->string("status");
            $table->longText("transaction_id")->nullable();
            $table->string("image");
            $table->foreignId("program_id")->constrained("programs")->onDeleted("CASCADE")->onUpdate("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
