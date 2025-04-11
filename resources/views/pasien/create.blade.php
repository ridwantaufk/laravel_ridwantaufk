@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">
                <i class="bi bi-person-plus-fill me-2 text-success"></i>Tambah Pasien
            </h2>
            <a href="{{ route('pasien.index') }}" class="btn btn-secondary shadow rounded-pill px-4">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow rounded-4 p-4">
            <form action="{{ route('pasien.store') }}" method="POST">
                @include('pasien.form')
            </form>
        </div>
    </div>
@endsection
