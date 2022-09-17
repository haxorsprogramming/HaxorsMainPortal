<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Dashboard extends Controller
{
    public function DashboardPage()
    {
        return view('dashboard.dashboardPage');
    }
    public function BerandaPage()
    {
        
    }
}
