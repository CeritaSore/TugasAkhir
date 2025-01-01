<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organization_token', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->boolean('is_used');
            $table->dateTime('expired_at');
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('org_roles_id')->nullable();
            $table->unsignedBigInteger('kemahasiswaan_id')->nullable();
            $table->foreign('organization_id')->references('id')->on('organization')->onDelete('cascade');
            $table->foreign('org_roles_id')->references('id')->on('org_roles')->onDelete('cascade');
            $table->foreign('kemahasiswaan_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_token');
    }
};
