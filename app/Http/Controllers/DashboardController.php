<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalRS' => RumahSakit::count(),
            'totalPasien' => Pasien::count(),
            'rumahSakit' => RumahSakit::latest()->take(5)->get(),
            'pasien' => Pasien::latest()->take(5)->get(),
        ]);
    }
}
