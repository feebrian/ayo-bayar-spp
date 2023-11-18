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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petugas_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->char('nisn', 10);

            $table->date('tgl_bayar');
            $table->string('bulan_dibayar', 8);
            $table->string('tahun_dibayar', 8);
            $table->unsignedBigInteger('spp_id');

            $table->decimal('jumlah_bayar');

            $table->foreign('spp_id')
                    ->references('spp_id')
                    ->on('siswas');

            $table->foreign('nisn')
                    ->references('nisn')
                    ->on('siswas')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
