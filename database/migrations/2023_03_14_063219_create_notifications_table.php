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
        Schema::create('tb_notification', function (Blueprint $table) {
            $table->id();
            $table->uuidMorphs('notificationable');
            $table->text('message');
            $table->enum('status', ['belum_dibaca', 'dibaca'])->default('belum_dibaca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_notification');
    }
};
