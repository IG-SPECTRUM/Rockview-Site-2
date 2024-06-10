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
        Schema::create('facaulty_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("facaulty_id")->constrained("facaulties")->onDeleted("CASCADE")->onUpdate("CASCADE");
            $table->foreignId("program_id")->constrained("programs")->onDeleted("CASCADE")->onUpdate("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facaulty_programs');
    }
};
