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
        $perPage = $request->get('per_page', 10); // defaultawa l 10

        $query = Pasien::with('rumahSakit')
            ->when($filterRs, fn($q) => $q->where('rumah_sakit_id', $filterRs));

        $data = $query->paginate($perPage)->withQueryString();

        if ($request->ajax()) {
            return view('pasien.table', compact('data'))->render(); // optional
        }

        return view('pasien.index', compact('data', 'rumahSakits', 'filterRs', 'perPage'));
    }


    public function create()
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.create', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ], [
            'nama.required' => 'Nama pasien wajib diisi.',
            'alamat.required' => 'Alamat pasien tidak boleh kosong.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.max' => 'Nomor telepon terlalu panjang.',
            'rumah_sakit_id.required' => 'Silakan pilih rumah sakit.',
            'rumah_sakit_id.exists' => 'Rumah sakit yang dipilih tidak valid.',
        ]);

        Pasien::create($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil disimpan!');
    }

    public function edit(Pasien $pasien)
    {
        $rumahSakits = RumahSakit::all();
        return view('pasien.edit', compact('pasien', 'rumahSakits'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ], [
            'nama.required' => 'Nama pasien wajib diisi.',
            'alamat.required' => 'Alamat pasien tidak boleh kosong.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.max' => 'Nomor telepon terlalu panjang.',
            'rumah_sakit_id.required' => 'Silakan pilih rumah sakit.',
            'rumah_sakit_id.exists' => 'Rumah sakit yang dipilih tidak valid.',
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus!');
    }
}
