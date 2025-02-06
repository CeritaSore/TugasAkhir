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
        Schema::create('org_coreteam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('org_id');
            $table->unsignedBigInteger('role_id');
            $table->enum('status', ['aktif', 'cuti', 'diberhentikan']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('org_id')->references('id')->on('organization')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('org_roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org_member');
    }
};
