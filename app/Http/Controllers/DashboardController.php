<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('DashboardToko/Dashboard', [
            'title' => 'Dashboard Toko'
        ]);
    }
}
