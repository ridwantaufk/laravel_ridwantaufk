@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">
                <i
                    class="bi {{ isset($rs) ? 'bi-pencil-square text-warning' : 'bi-plus-circle-fill text-success' }} me-2"></i>
                {{ isset($rs) ? 'Edit Rumah Sakit' : 'Tambah Rumah Sakit' }}
            </h2>
            <a href="{{ route('rumah-sakit.index') }}" class="btn btn-secondary shadow rounded-pill px-4">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow rounded-4">
            <div class="card-body p-4">
                <form action="{{ isset($rs) ? route('rumah-sakit.update', $rs->id) : route('rumah-sakit.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($rs))
                        @method('PUT')
                    @endif

                    @include('rumah_sakit.form')

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
