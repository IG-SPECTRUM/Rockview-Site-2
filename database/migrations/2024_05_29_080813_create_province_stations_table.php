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
        Schema::create('province_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("province_id")->constrained("provinces")->onDeleted("CASCADE")->onUpdate("CASCADE");
            $table->string("station");
            $table->string("date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('province_stations');
    }
};
