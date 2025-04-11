<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        return view('rumah_sakit.index', compact('rumahSakits'));
    }

    public function create()
    {
        return view('rumah_sakit.create');
    }

    public function store(Request $request)
    {
        RumahSakit::create($request->all());
        return redirect()->route('rumah-sakit.index');
    }

    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumah_sakit.edit', ['rs' => $rumahSakit]);
    }

    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $rumahSakit->update($request->all());
        return redirect()->route('rumah-sakit.index');
    }

    public function destroy(RumahSakit $rumahSakit)
    {
        $rumahSakit->delete();
        return redirect()->route('rumah-sakit.index');
    }
}
