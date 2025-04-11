<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10); // default 10 data per halaman
        $rumahSakits = RumahSakit::paginate($perPage);

        return view('rumah_sakit.index', compact('rumahSakits', 'perPage'));
    }


    public function create()
    {
        return view('rumah_sakit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',
        ], [
            'nama.required' => 'Nama rumah sakit wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
        ]);

        RumahSakit::create($validated);

        return redirect()->route('rumah-sakit.index')->with('success', 'Data rumah sakit berhasil ditambahkan.');
    }



    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumah_sakit.edit', ['rs' => $rumahSakit]);
    }



    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|numeric',
        ], [
            'nama.required' => 'Nama rumah sakit wajib diisi.',
            'nama.string' => 'Nama rumah sakit harus berupa teks.',
            'nama.max' => 'Nama rumah sakit maksimal 255 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa teks.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.numeric' => 'Nomor telepon harus berupa angka.',
        ]);

        $rumahSakit->update([
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'],
            'email' => $validated['email'],
            'telepon' => $validated['telepon'],
        ]);

        return redirect()->route('rumah-sakit.index')->with('success', 'Data rumah sakit berhasil diperbarui.');
    }


    public function destroy(RumahSakit $rumahSakit)
    {
        $rumahSakit->delete();
        return redirect()->route('rumah-sakit.index');
    }
}
