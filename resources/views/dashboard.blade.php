@extends('layouts.app')
<style>
    :root {
        --bg-main: #f0f4ff;
        --shadow-dark: #d1d9e6;
        --shadow-light: #ffffff;
        --card-radius: 20px;
    }

    body {
        background-color: var(--bg-main);
    }

    .neumorphic-card {
        background: var(--bg-main);
        border-radius: var(--card-radius);
        padding: 1.5rem;
        box-shadow:
            8px 8px 20px var(--shadow-dark),
            -8px -8px 20px var(--shadow-light);
        transition: all 0.3s ease-in-out;
    }

    .neumorphic-card:hover {
        box-shadow:
            inset 4px 4px 12px var(--shadow-dark),
            inset -4px -4px 12px var(--shadow-light);
    }

    .section-header {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-header i {
        font-size: 1.2rem;
    }

    .data-value {
        font-size: 2.2rem;
        font-weight: bold;
        color: #3b82f6;
    }

    .data-list {
        list-style-type: none;
        padding-left: 1rem;
    }

    .data-list li::before {
        content: '•';
        color: #6b7280;
        margin-right: 0.5rem;
    }

    .see-more {
        color: #2563eb;
        font-size: 0.875rem;
        text-decoration: none;
    }

    .see-more:hover {
        text-decoration: underline;
    }
</style>
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Info Ringkas -->
            <div class="flex flex-col md:flex-row md:space-x-8 space-y-6 md:space-y-0 mb-12">
                <div class="neumorphic-card">
                    <div class="section-header">
                        <i class="bi bi-hospital text-blue-600"></i> Total Rumah Sakit
                    </div>
                    <p class="data-value">{{ $totalRS }}</p>
                </div>
                <div class="neumorphic-card">
                    <div class="section-header">
                        <i class="bi bi-person-vcard text-green-600"></i> Total Pasien
                    </div>
                    <p class="data-value text-green-600">{{ $totalPasien }}</p>
                </div>
            </div>

            <!-- Tabel Rumah Sakit -->
            <div class="neumorphic-card mb-6">
                <div class="flex justify-between items-center mb-3">
                    <div class="section-header">
                        <i class="bi bi-buildings text-purple-600"></i> Daftar Rumah Sakit
                    </div>
                    <a href="{{ route('rumah-sakit.index') }}" class="see-more">Lihat semua</a>
                </div>
                <ul class="data-list text-gray-700">
                    @forelse ($rumahSakit as $rs)
                        <li>{{ $rs->nama }} - {{ $rs->alamat }}</li>
                    @empty
                        <li><em>Tidak ada data rumah sakit.</em></li>
                    @endforelse
                </ul>
            </div>

            <!-- Tabel Pasien -->
            <div class="neumorphic-card">
                <div class="flex justify-between items-center mb-3">
                    <div class="section-header">
                        <i class="bi bi-person-heart text-pink-600"></i> Daftar Pasien Terbaru
                    </div>
                    <a href="{{ route('pasien.index') }}" class="see-more">Lihat semua</a>
                </div>
                <ul class="data-list text-gray-700">
                    @forelse ($pasien as $ps)
                        <li>{{ $ps->nama }} - {{ $ps->alamat }}</li>
                    @empty
                        <li><em>Belum ada pasien.</em></li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
@endsection
