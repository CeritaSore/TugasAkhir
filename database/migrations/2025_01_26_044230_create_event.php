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
        Schema::create('event_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->foreignId('organization_id')->constrained('organization');
            $table->foreignId('event_type_id')->constrained('event_type');
            $table->timestamps();
        });
        schema::create('event_participant', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        schema::create('event_sponsor', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
        Schema::create('event_coreteam_role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('event_coreteam', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('event_id')->constrained('event');
            $table->foreignId('event_coreteam_role_id')->constrained('event_coreteam_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
        Schema::dropIfExists('event_type');
        Schema::dropIfExists('event_coreteam');
        Schema::dropIfExists('event_participant');
        Schema::dropIfExists('event_sponsor');
        Schema::dropIfExists('event_coreteam_role');
    }
};
