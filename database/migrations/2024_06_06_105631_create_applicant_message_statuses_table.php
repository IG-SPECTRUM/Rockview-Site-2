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
        Schema::create('applicant_message_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onDeleted("CASCADE")->onUpdate("CASCADE");
            $table->foreignId("contact_id")->constrained("contacts")->onDeleted("CASCADE")->onUpdate("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_message_statuses');
    }
};
