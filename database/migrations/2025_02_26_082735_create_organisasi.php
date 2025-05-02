<?php

use App\View\Components\table;
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
        # create organisasi table
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
        # create organisasi role table
        Schema::create('organisasi_role', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->timestamps();
        });
        # create organisasi token table
        Schema::create('organisasi_token', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->unsignedBigInteger('receiver');
            $table->unsignedBigInteger('creator');
            $table->unsignedBigInteger('organisasi_id');
            $table->unsignedBigInteger('role_id');
            $table->boolean('status')->default(false);
            $table->date('expired');
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
            $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('creator')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('organisasi_role')->onDelete('cascade');
            $table->timestamps();
        });
        # create organisasi divisi table
        Schema::create('organisasi_divisi', function (Blueprint $table) {
            $table->id();
            $table->string('divisi');
            $table->timestamps();
        });
        # create organisasi pengurus table
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

        # create organisasi program kerja table
        Schema::create('organisasi_program', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tempat');
            $table->unsignedBigInteger('pelaksana');
            $table->enum('status', ['direncanakan', 'dilaksanakan', 'selesai'])->default('direncanakan');
            $table->boolean('is_deleted')->default(false);
            $table->foreign('pelaksana')->references('id')->on('organisasi_pengurus')->onDelete('cascade');
            $table->timestamps();
        });
        # create organisasi program kerja table
        Schema::create('organisasi_anggaran', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah_anggaran', 15, 2);
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('id')->on('organisasi_program')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('organisasi_anggaran_list', function (Blueprint $table) {
            $table->id();
            $table->decimal('nama_anggaran');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('divisi_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('divisi_id')->references('id')->on('organisasi_divisi')->onDelete('cascade');
            $table->timestamps();
        });


        # create organisasi event table
        Schema::create('event_type', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->timestamps();
        });

        # create organisasi event table
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('slug');
            $table->unsignedBigInteger('proker_id');
            $table->boolean('is_deleted')->default(false);
            $table->foreign('type_id')->references('id')->on('event_type')->onDelete('cascade');
            $table->foreign('proker_id')->references('id')->on('organisasi_program')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('event_form', function (Blueprint $table) {
            $table->id();
            $table->string('nama_form');
            $table->unsignedBigInteger('event_id');
            $table->string('slug');
            $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('form_type', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->timestamps();
        });
        Schema::create('event_question', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->foreign('form_id')->references('id')->on('event_form')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('form_type')->onDelete('cascade');
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
