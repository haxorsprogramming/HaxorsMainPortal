<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Registrasi_Member extends Model
{
    protected $table = "tbl_registrasi_member";
    protected $fillable = [
        'email',
        'nama',
        'hp',
        'jurusan',
        'alamat',
        'token',
        'telegram_id',
        'status_pembayaran',
        'waktu_update'
    ];
    public $timestamps = false;
}
