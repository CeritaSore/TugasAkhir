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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('event_type_id');
            $table->string('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->foreign('event_type_id')->references('id')->on('event_type');
            $table->foreign('created_by')->references('id')->on('organization');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
