<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends Migration {
=======
return new class extends Migration
{
>>>>>>> de896c1 (add laravel to repository)
=======
return new class extends Migration {
>>>>>>> 47b3a8f (update repo & creating login)
=======
return new class extends Migration {
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
<<<<<<< HEAD
<<<<<<< HEAD
            $table->string('nim');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['kemahasiswaan', 'mahasiswa'])->default('mahasiswa');
<<<<<<< HEAD
=======
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
>>>>>>> de896c1 (add laravel to repository)
=======
>>>>>>> 47b3a8f (update repo & creating login)
=======
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['kemahasiswaan', 'mahasiswa'])->default('mahasiswa');
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
