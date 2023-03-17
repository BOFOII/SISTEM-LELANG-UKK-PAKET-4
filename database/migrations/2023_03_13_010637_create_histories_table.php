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
        Schema::create('histroy_lelang', function (Blueprint $table) {
            $table->uuid('id_history')->primary();
            $table->foreignUuid('id_lelang')->references('id_lelang')->on('tb_lelang')->onDelete('cascade');
            $table->foreignUuid('id_barang')->references('id_barang')->on('tb_barang')->onDelete('cascade');
            $table->foreignUuid('id_user')->references('id_user')->on('tb_masyarakat')->onDelete('cascade');
            $table->bigInteger('penawaran_harga', false, true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histroy_lelang');
    }
};
