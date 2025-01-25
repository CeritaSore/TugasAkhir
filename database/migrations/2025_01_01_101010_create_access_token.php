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
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('created_for');
            $table->unsignedBigInteger('roles_id');
            $table->unsignedBigInteger('organization_id');
            $table->boolean('status')->default(0);
            $table->datetime('expired_at');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('created_for')->references('id')->on('users');
            $table->foreign('roles_id')->references('id')->on('org_roles');
            $table->foreign('organization_id')->references('id')->on('organization');
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
