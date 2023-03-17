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
        Schema::create('tb_masyarakat', function (Blueprint $table) {
            $table->uuid('id_user')->primary();
            $table->string('nama_lengkap', 25);
            $table->string('username', 25);
            $table->string('password');
            $table->string('telp', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_masyarakat');
    }
};
