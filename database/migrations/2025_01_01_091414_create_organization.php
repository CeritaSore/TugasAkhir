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
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->dateTime('tanggal_berdiri');
<<<<<<< HEAD
<<<<<<< HEAD
            $table->enum('status',['aktif','nonaktif','tertunda'])->default('tertunda');
=======
>>>>>>> 47b3a8f (update repo & creating login)
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization');
    }
};
