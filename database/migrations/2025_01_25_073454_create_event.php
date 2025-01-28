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
            $table->foreignId('event_type_id')->nullable()->constrained('event_type')->nullOnDelete();
            $table->string('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->foreignId('created_by_organization_id')->constrained('organization');
            $table->timestamps();
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
