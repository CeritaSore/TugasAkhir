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
        Schema::create('organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->date('tanggal_berdiri');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->enum('tipe_organisasi', ['legislatif', 'eksekutif', 'unit kegiatan'])->default('unit kegiatan');
            $table->timestamps();
        });
        Schema::create('organisasi_role', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->timestamps();
        });
        Schema::create('organisasi_token', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->unsignedBigInteger('receiver');
            $table->unsignedBigInteger('creator');
            $table->unsignedBigInteger('organisasi_id');
            $table->unsignedBigInteger('role_id');
            $table->boolean('status');
            $table->date('expired');
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
            $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('creator')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('organisasi_role')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('organisasi_divisi', function (Blueprint $table) {
            $table->id();
            $table->string('divisi');
            $table->timestamps();
        });
        Schema::create('organisasi_pengurus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('organisasi_id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('divisi_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('organisasi_role')->onDelete('cascade');
            $table->foreign('divisi_id')->references('id')->on('organisasi_divisi')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('organisasi_program', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->text('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tempat');
            $table->decimal('anggaran');
            $table->unsignedBigInteger('pelaksana');
            $table->enum('status', ['direncanakan', 'dilaksanakan', 'selesai'])->default('direncanakan');
            $table->foreign('pelaksana')->references('id')->on('organisasi_pengurus')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('event_type', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->timestamps();
        });
        Schema::create('event_form_type', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->timestamps();
        });
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('slug');
            $table->unsignedBigInteger('organisasi_id');
            $table->foreign('type_id')->references('id')->on('event_type')->onDelete('cascade');
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('event_form', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('input_type');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
            $table->foreign('input_type')->references('id')->on('event_form_type')->onDelete('cascade');
        });
        Schema::create('event_answer', function (Blueprint $table) {
            $table->id();
            $table->string('jawaban');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('form_id')->references('id')->on('event_form')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasi');
    }
};
