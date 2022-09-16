<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDataRegistrasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data_registrasi', function (Blueprint $table) {
            $table -> id();
            $table -> char('email', 250);
            $table -> char('nama_lengkap', 200);
            $table -> char('alamat', 200);
            $table -> char('jurusan', 200);
            $table -> char('nomor_handphone', 200);
            $table -> text('api_token') -> nullable();
            $table -> char('status_pembayaran', 200);
            $table -> timestamps(); 
            $table -> char('active', 1);
        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_data_registrasi');
    }
}
