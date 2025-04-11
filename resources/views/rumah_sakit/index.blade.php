@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2 class="fw-bold mb-0">
                <i class="bi bi-clipboard2-pulse me-2 text-primary"></i> Daftar Rumah Sakit
            </h2>
            <div class="d-flex align-items-center gap-2">
                <form method="GET">
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
                <a href="{{ route('rumah-sakit.create') }}" class="btn btn-success shadow rounded-pill px-4">
                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Rumah Sakit
                </a>
            </div>
        </div>

        @forelse ($rumahSakits as $rs)
            <div class="card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center gy-3">
                        <div class="col-md-3 fw-semibold">
                            <i class="bi bi-hospital-fill text-primary me-2"></i> {{ $rs->nama }}
                        </div>
                        <div class="col-md-3 text-muted small">
                            <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $rs->alamat }}
                        </div>
                        <div class="col-md-2 text-muted small">
                            <i class="bi bi-envelope-fill text-warning me-1"></i> {{ $rs->email }}
                        </div>
                        <div class="col-md-2 text-muted small">
                            <i class="bi bi-telephone-fill text-success me-1"></i> {{ $rs->telepon }}
                        </div>
                        <div class="col-md-2 d-flex justify-content-end gap-2">
                            <a href="{{ route('rumah-sakit.edit', $rs->id) }}"
                                class="btn btn-sm btn-warning rounded-pill shadow-sm px-3">
                                <i class="bi bi-pencil me-1"></i> Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger rounded-pill shadow-sm px-3 btn-delete"
                                data-id="{{ $rs->id }}" data-url="{{ route('rumah-sakit.destroy', $rs->id) }}">
                                <i class="bi bi-trash me-1"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle me-1"></i> Tidak ada data rumah sakit 😢
            </div>
        @endforelse
        <div class="mt-5 pt-4 pb-2 border-top">
            <div class="container d-flex justify-content-center">
                <div class="pagination-wrapper">
                    {{ $rumahSakits->appends(['per_page' => $perPage])->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
