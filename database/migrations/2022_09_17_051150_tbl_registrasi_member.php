<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblRegistrasiMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_registrasi_member', function (Blueprint $table) {
            $table -> id();
            $table -> char('email', 200);
            $table -> char('nama', 200);
            $table -> char('hp', 200);
            $table -> char('jurusan', 200);
            $table -> char('alamat', 200);
            $table -> char('telegram_id', 200);
            $table -> char('token', 200);
            $table -> char('status_pembayaran', 200);
            $table -> char('waktu_update', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_registrasi_member');
    }
}
