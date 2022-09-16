<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Dashboard;

Route::get('/', [C_Auth::class, 'LoginPage']);

Route::get('/registrasi', [C_Auth::class, 'RegistrasiPage']);

Route::post('/auth/login/process', [C_Auth::class, 'LoginProcess']);

Route::get('/dashboard', [C_Dashboard::class, 'DashboardPage']);