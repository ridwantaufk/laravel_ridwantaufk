<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $rumahSakits = RumahSakit::all();
        $filterRs = $request->get('rumah_sakit_id');

        $data = Pasien::with('rumahSakit')
            ->when($filterRs, fn($q) => $q->where('rumah_sakit_id', $filterRs))
            ->get();

        if ($request->ajax()) {
            return view('pasien.table', compact('data'))->render(); // untuk replace via jQuery
        }

        return view('pasien.index', compact('data', 'rumahSakits', 'filterRs'));
    }

    public function create()
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.create', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telpon' => 'required|string|max:20',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ]);

        Pasien::create($validated);

        return redirect()->route('pasien.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $item = Pasien::findOrFail($id);
        $rumahSakits = RumahSakit::all();
        return view('pasien.edit', compact('item', 'rumahSakits'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telpon' => 'required|string|max:20',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ]);

        $item = Pasien::findOrFail($id);
        $item->update($validated);

        return redirect()->route('pasien.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        Pasien::destroy($id);
        return response()->json(['success' => true]);
    }
}
