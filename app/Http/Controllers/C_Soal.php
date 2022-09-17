<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Soal extends Controller
{
    public function DataSoal()
    {
        return view('dashboard.soal.dataSoal');
    }
}
