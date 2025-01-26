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
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->datetime('tanggal_berdiri');
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->timestamps();
        });
        Schema::create('organization_role', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->foreignId('organization_id')->constrained('organization')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('organization_coreteam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('organization_id')->constrained('organization')->onDelete('cascade');
            $table->foreignId('roles_id')->constrained('organization_role')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('organization_member', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->foreignId('organization_id')->constrained('organization')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('organization_token', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('created_for');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_for')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('roles_id')->constrained('organization_role')->onDelete('cascade');
            $table->foreignId('organization_id')->constrained('organization')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization');
        Schema::dropIfExists('organization_role');
        Schema::dropIfExists('organization_coreteam');
        Schema::dropIfExists('organization_member');
        Schema::dropIfExists('organization_token');
    
    }
};
