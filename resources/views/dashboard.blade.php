@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Info Ringkas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-2">Total Rumah Sakit</h3>
                    <p class="text-2xl text-blue-600">{{ $totalRS }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-2">Total Pasien</h3>
                    <p class="text-2xl text-green-600">{{ $totalPasien }}</p>
                </div>
            </div>

            <!-- Tabel Rumah Sakit -->
            <div class="bg-white shadow rounded mb-6">
                <div class="p-4 border-b flex justify-between items-center">
                    <h4 class="font-semibold text-gray-700">Daftar Rumah Sakit</h4>
                    <a href="{{ route('rumah-sakit.index') }}" class="text-sm text-blue-500 hover:underline">Lihat semua</a>
                </div>
                <div class="p-4">
                    <ul class="list-disc list-inside text-gray-800">
                        @foreach ($rumahSakit as $rs)
                            <li>{{ $rs->nama }} - {{ $rs->alamat }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Tabel Pasien -->
            <div class="bg-white shadow rounded">
                <div class="p-4 border-b flex justify-between items-center">
                    <h4 class="font-semibold text-gray-700">Daftar Pasien Terbaru</h4>
                    <a href="{{ route('pasien.index') }}" class="text-sm text-blue-500 hover:underline">Lihat semua</a>
                </div>
                <div class="p-4">
                    <ul class="list-disc list-inside text-gray-800">
                        @foreach ($pasien as $ps)
                            <li>{{ $ps->nama }} - {{ $ps->alamat }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
