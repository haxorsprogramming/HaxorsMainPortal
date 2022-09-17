<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Member;
use App\Http\Controllers\C_Soal;

Route::get('/', [C_Auth::class, 'LoginPage']);

// auth 
Route::get('/registrasi', [C_Auth::class, 'RegistrasiPage']);
Route::post('/auth/login/process', [C_Auth::class, 'LoginProcess']);

// dashboard 
Route::get('/dashboard', [C_Dashboard::class, 'DashboardPage']);
Route::get('/dashboard/beranda', [C_Dashboard::class, 'BerandaPage']);

// token 
Route::get('/registrasi/token/list', [C_Member::class, 'TokenRegistrasi']);
Route::post('/token/create/process', [C_Member::class, 'CreateTokenProses']);
Route::post('/token/delete/process', [C_Member::class, 'DeleteTokenProses']);

// member 
Route::get('/registrasi/member/list', [C_Member::class, 'DataRegistrasiMember']);

// soal 
Route::get('/soal/list', [C_Soal::class, 'DataSoal']);