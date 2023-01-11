<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class KasirController extends Controller
{
    public function index()
    {
        return Inertia::render('Kasir/Utama', [
            'title' => 'Halaman Utama'
        ]);
    }
}
