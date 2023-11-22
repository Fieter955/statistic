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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Judul_Buku')->default('Judul Buku Default');
            $table->string('Penulis')->default('Judul Buku Default');
            $table->string('Pengarang')->default('Judul Buku Default');
            $table->date('Tanggal_Terbit')->default('2022-01-01'); 
            $table->string('Gambar');
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
