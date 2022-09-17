<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Soal_Test extends Model
{
    protected $table = "tbl_soal_test";
    protected $fillable = [
        'kode_soal',
        'soal',
    ];
    public $timestamps = false;
}
