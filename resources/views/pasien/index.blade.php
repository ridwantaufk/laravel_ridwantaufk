@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2 class="fw-bold mb-0">
                <i class="bi bi-person-vcard me-2 text-primary"></i> Daftar Pasien
            </h2>
            <div class="d-flex align-items-center gap-2">
                <form method="GET" action="{{ route('pasien.index') }}">
                    <input type="hidden" name="rumah_sakit_id" value="{{ $filterRs }}">
                    <div class="input-group">
                        <label class="input-group-text" for="per_page">Tampilkan</label>
                        <select name="per_page" id="per_page" class="form-select" onchange="this.form.submit()">
                            @foreach ([5, 10, 15, 20] as $jumlah)
                                <option value="{{ $jumlah }}" {{ $perPage == $jumlah ? 'selected' : '' }}>
                                    {{ $jumlah }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <a href="{{ route('pasien.create') }}" class="btn btn-success shadow rounded-pill px-4">
                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Pasien
                </a>
            </div>
        </div>

        <div class="mb-4">
            <form method="GET" action="{{ route('pasien.index') }}">
                <label for="filter_rs" class="form-label fw-semibold">Filter Rumah Sakit</label>
                <select id="filter_rs" name="rumah_sakit_id" class="form-select shadow-sm" onchange="this.form.submit()">
                    <option value="">-- Semua Rumah Sakit --</option>
                    @foreach ($rumahSakits as $rs)
                        <option value="{{ $rs->id }}" {{ $filterRs == $rs->id ? 'selected' : '' }}>
                            {{ $rs->nama }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        @forelse ($data as $pasien)
            <div class="card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center gy-2">
                        <div class="col-md-3 fw-semibold">
                            <i class="bi bi-person-circle text-primary me-2"></i>{{ $pasien->nama }}
                        </div>
                        <div class="col-md-3 text-muted small">
                            <i class="bi bi-geo-alt-fill me-1 text-danger"></i> {{ $pasien->alamat }}
                        </div>
                        <div class="col-md-2 text-muted small">
                            <i class="bi bi-telephone-fill me-1 text-success"></i> {{ $pasien->telepon }}
                        </div>
                        <div class="col-md-2 text-muted small">
                            <i class="bi bi-hospital me-1 text-secondary"></i> {{ $pasien->rumahSakit->nama ?? '-' }}
                        </div>
                        <div class="col-md-2 d-flex justify-content-end gap-2">
                            <a href="{{ route('pasien.edit', $pasien->id) }}"
                                class="btn btn-sm btn-warning rounded-pill shadow-sm px-3">
                                <i class="bi bi-pencil me-1"></i> Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger rounded-pill shadow-sm px-3 btn-delete"
                                data-id="{{ $pasien->id }}" data-url="{{ route('pasien.destroy', $pasien->id) }}">
                                <i class="bi bi-trash me-1"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                <i class="bi bi-emoji-frown me-1 text-danger"></i> Tidak ada data pasien 😢
            </div>
        @endforelse

        <div class="mt-5 pt-4 pb-2 border-top">
            <div class="container d-flex justify-content-center">
                <div class="pagination-wrapper">
                    {{ $data->appends(['per_page' => $perPage, 'rumah_sakit_id' => $filterRs])->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
