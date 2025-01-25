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
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
            $table->boolean('is_used');
            $table->dateTime('expired_at');
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('org_roles_id')->nullable();
            $table->unsignedBigInteger('kemahasiswaan_id')->nullable();
            $table->foreign('organization_id')->references('id')->on('organization')->onDelete('cascade');
            $table->foreign('org_roles_id')->references('id')->on('org_roles')->onDelete('cascade');
            $table->foreign('kemahasiswaan_id')->references('id')->on('users')->onDelete('cascade');
>>>>>>> 47b3a8f (update repo & creating login)
=======
            $table->boolean('is_used')->default(0);
            $table->dateTime('expired_at');
            $table->unsignedBigInteger('redeemed_by')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('org_roles_id')->nullable();
            $table->unsignedBigInteger('kemahasiswaan_id')->nullable();
            $table->foreign('redeemed_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organization')->onDelete('cascade');
            $table->foreign('org_roles_id')->references('id')->on('org_roles')->onDelete('cascade');
            $table->foreign('kemahasiswaan_id')->references('id')->on('users')->onDelete('cascade');
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
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
