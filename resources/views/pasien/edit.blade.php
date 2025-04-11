@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">
                <i class="bi bi-pencil-square me-2 text-warning"></i>Edit Pasien
            </h2>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary shadow rounded-pill px-4">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow rounded-4 p-4">
            <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('pasien.form', ['pasien' => $pasien, 'rumahSakits' => $rumahSakits])
            </form>

        </div>
    </div>
@endsection
