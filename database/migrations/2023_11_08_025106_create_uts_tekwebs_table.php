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
        Schema::create('uts_tekwebs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Judul_Buku')->default('Judul Buku Default');
            $table->string('Penulis')->default('Judul Buku Default');
            $table->string('Pengarang')->default('Judul Buku Default');
            $table->date('Tanggal_Terbit')->default('2022-01-01'); 
            $table->string('Gambar');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uts_tekwebs');
    }
};
