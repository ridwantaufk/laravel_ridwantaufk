@extends('layouts.app')

<style>
    :root {
        --bg-main: #e0e5ec;
        --shadow-dark: rgba(163, 177, 198, 0.6);
        --shadow-light: #fff;
        --card-radius: 20px;
    }

    body {
        background-color: var(--bg-main);
    }

    .neumorphic-card {
        background: var(--bg-main);
        border-radius: var(--card-radius);
        box-shadow:
            9px 9px 16px var(--shadow-dark),
            -9px -9px 16px var(--shadow-light);
        transition: all 0.3s ease-in-out;
    }

    .neumorphic-card:hover {
        box-shadow:
            inset 4px 4px 10px var(--shadow-dark),
            inset -4px -4px 10px var(--shadow-light);
    }

    .neumorphic-button {
        background: var(--bg-main);
        border: none;
        border-radius: 30px;
        box-shadow:
            6px 6px 12px var(--shadow-dark),
            -6px -6px 12px var(--shadow-light);
        transition: all 0.3s ease-in-out;
    }

    .neumorphic-button:hover {
        box-shadow:
            inset 3px 3px 6px var(--shadow-dark),
            inset -3px -3px 6px var(--shadow-light);
    }

    .neumorphic-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--bg-main);
        box-shadow:
            6px 6px 12px var(--shadow-dark),
            -6px -6px 12px var(--shadow-light);
        font-size: 1.2rem;
        color: #555;
        flex-shrink: 0;
        transition: 0.3s;
    }


    .neumorphic-icon:hover {
        box-shadow:
            inset 3px 3px 6px var(--shadow-dark),
            inset -3px -3px 6px var(--shadow-light);
        color: #000;
    }

    .truncate-wrap {
        word-break: break-word;
        white-space: normal;
    }

    @media (max-width: 768px) {
        .truncate-wrap {
            font-size: 0.9rem;
        }
    }

    .btn-edit {
        background-color: #b6e1cd !important;
        /* biru muda kalem */
        color: #1e3a8a;
    }

    .btn-edit:hover {
        background-color: #c3dbf1;
        box-shadow:
            inset 3px 3px 6px var(--shadow-dark),
            inset -3px -3px 6px var(--shadow-light);
    }

    .btn-delete {
        background-color: #ffc5ca !important;
        /* merah muda lembut */
        color: #842029;
    }

    .btn-delete:hover {
        background-color: #f1c1c4;
        box-shadow:
            inset 3px 3px 6px var(--shadow-dark),
            inset -3px -3px 6px var(--shadow-light);
    }

    .btn-create {
        background-color: #94f2c0 !important;
        /* hijau muda adem */
        color: #157347;
    }

    .btn-create:hover {
        background-color: #90d8b4 !important;
        box-shadow:
            inset 3px 3px 6px var(--shadow-dark),
            inset -3px -3px 6px var(--shadow-light);
    }
</style>


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
                <a href="{{ route('rumah-sakit.create') }}" class="neumorphic-button btn px-4 btn-create">
                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Rumah Sakit
                </a>

            </div>
        </div>

        @forelse ($rumahSakits as $rs)
            <div class="neumorphic-card p-4 mb-4">
                <div class="row align-items-center gy-3">
                    <div class="col-md-3 fw-semibold d-flex align-items-center gap-2 truncate-wrap">
                        <div class="neumorphic-icon text-primary">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                        {{ $rs->nama }}
                    </div>
                    <div class="col-md-3 text-muted small d-flex align-items-center gap-2 truncate-wrap">
                        <div class="neumorphic-icon text-danger">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        {{ $rs->alamat }}
                    </div>
                    <div class="col-md-2 text-muted small d-flex align-items-center gap-2 truncate-wrap">
                        <div class="neumorphic-icon text-warning">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        {{ $rs->email }}
                    </div>
                    <div class="col-md-2 text-muted small d-flex align-items-center gap-2 truncate-wrap">
                        <div class="neumorphic-icon text-success">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        {{ $rs->telepon }}
                    </div>

                    <div class="col-md-2 d-flex justify-content-end gap-2">
                        <a href="{{ route('rumah-sakit.edit', $rs->id) }}"
                            class="neumorphic-button btn btn-sm text-dark px-3 btn-edit">
                            <i class="bi bi-pencil me-1"></i> Edit
                        </a>
                        <button type="button" class="neumorphic-button btn btn-sm text-dark px-3 btn-delete"
                            data-id="{{ $rs->id }}" data-url="{{ route('rumah-sakit.destroy', $rs->id) }}">
                            <i class="bi bi-trash me-1"></i> Hapus
                        </button>

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
