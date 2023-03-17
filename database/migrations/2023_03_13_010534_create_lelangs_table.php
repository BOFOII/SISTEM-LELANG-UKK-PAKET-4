<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lelang', function (Blueprint $table) {
            $table->uuid('id_lelang')->primary();
            $table->foreignUuid('id_barang')->references('id_barang')->on('tb_barang')->onDelete('cascade');
            $table->date('tgl_lelang');
            $table->bigInteger('harga_akhir', false, true)->nullable();
            $table->foreignUuid('id_user')->nullable()->references('id_user')->on('tb_masyarakat')->onDelete('cascade');
            $table->foreignUuid('id_petugas')->references('id_petugas')->on('tb_petugas')->onDelete('cascade');
            $table->enum('status', ['dibuka', 'ditutup'])->default('dibuka');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_lelang');
    }
};
