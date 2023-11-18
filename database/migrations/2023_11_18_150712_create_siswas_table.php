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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->char('nisn', 10)->unique();
            $table->char('nis', 8)->unique();
            $table->unsignedBigInteger('kelas_id');
            $table->string('nama', 35);
            $table->text('alamat');
            $table->unsignedBigInteger('spp_id');
            $table->string('no_telp', 13);

            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('spp_id')->references('id')->on('spps');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
