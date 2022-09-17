<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Registrasi_Member;

class C_Member extends Controller
{
    public function TokenRegistrasi()
    {
        $dataToken = M_Registrasi_Member::all();
        $dr = ['dataToken' => $dataToken];
        return view('dashboard.member.tokenRegistrasiPage', $dr);
    }

    public function DataRegistrasiMember()
    {
        $dataMember = M_Registrasi_Member::all();
        $dr = ['dataMember' => $dataMember];
        return view('dashboard.member.dataMember', $dr);
    }

    public function CreateTokenProses(Request $request)
    {
        // {'email':email, 'nama':nama}
        $token = random_int(100000, 999999);

        $rm = new M_Registrasi_Member();
        $rm -> email = $request -> email;
        $rm -> nama = $request -> nama;
        $rm -> hp = "-";
        $rm -> jurusan = "-";
        $rm -> alamat = "-";
        $rm -> telegram_id = "-";
        $rm -> token = $token;
        $rm -> status_pembayaran = "done";
        $rm -> waktu_update = date('Y-m-d H:i:s');
        $rm -> save();

        $dr = ['status' => 'sukses', 'token' => $token];
        return \Response::json($dr);
    }
    public function DeleteTokenProses(Request $request)
    {
        M_Registrasi_Member::where('id', $request -> id) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
