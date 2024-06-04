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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->char('nisn', 10);
            $table->char('nis', 8);
            $table->string('nama', 35);
            $table->string('password', 255);
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')
            ->cascadeonUpdate()
            ->cascadeonDelete();
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->unsignedBigInteger('spp_id');
            $table->foreign('spp_id')->references('id')->on('spps')
            ->cascadeonUpdate()
            ->cascadeonDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
