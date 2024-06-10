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
        Schema::create('user_access_controls', function (Blueprint $table) {
            $table->id();
            $table->string("module");
            $table->string("access");
            $table->foreignId("user_id")->constrained("users")->onDeleted("CASCADE")->onUpdate("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_access_controls');
    }
};
