<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Soal_Test;


class C_Soal extends Controller
{
    public function DataSoal()
    {
        $dataSoal = M_Soal_Test::all();
        $dr = ['dataSoal' => $dataSoal];
        return view('dashboard.soal.dataSoal', $dr);
    }
    public function ProsesTambahSoal(Request $request)
    {
        $kode_soal = random_int(100, 10000);
        $soal = new M_Soal_Test();
        $soal -> kode_soal = $kode_soal;
        $soal -> soal = $request -> isi;
        $soal -> save();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function ProsesHapusSoal(Request $request)
    {
        M_Soal_Test::where('kode_soal', $request -> kd) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
