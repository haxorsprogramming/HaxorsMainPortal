<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Models\M_User;

class C_Auth extends Controller
{
    public function LoginPage()
    {
        $arrPic = ['1','2'];
        $pic = Arr::random($arrPic);
        $pathPic = asset('ladun/login/assets/media/photos/cover_'.$pic.'.jpg');
        // $dr = ['pic' => $pic, 'pathPic' => $pathPic];
        return view('auth.loginPage', ['pic' => $pic, 'pathcover' => $pathPic]);
    }
    public function RegistrasiPage()
    {
        $arrPic = ['1','2'];
        $pic = Arr::random($arrPic);
        $pathPic = asset('ladun/login/assets/media/photos/cover_'.$pic.'.jpg');
        // $dr = ['pic' => $pic, 'pathPic' => $pathPic];
        return view('auth.registrasiPage', ['pic' => $pic, 'pathcover' => $pathPic]);
    }
    public function LoginProcess(Request $request)
    {
        $tUser = M_User::where('username', $request -> username) -> count();
        if($tUser < 1){
            $status = "NO_USER";
        }else{
            $dUser = M_User::where('username', $request -> username) -> first();
            $cekUser = password_verify($request -> password, $dUser -> password);
            if($cekUser == true){
                $status = "SUCCESS";
            }else{
                $status = "WRONG_PASSWORD";
            }
            
        }
        $dr = ['status' => $status];
        return \Response::json($dr);
    }
}
