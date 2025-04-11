<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manajemen RS & Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --cream-bg: #f0f4ff;
            --shadow-dark: #d1d9e6;
            --shadow-light: #ffffff;
        }

        body {
            background: var(--cream-bg);
            font-family: 'Segoe UI', sans-serif;
            color: #444;
        }

        .card-intro {
            background: var(--cream-bg);
            border-radius: 20px;
            padding: 40px;
            box-shadow:
                8px 8px 20px var(--shadow-dark),
                -8px -8px 20px var(--shadow-light);
            transition: 0.3s ease;
        }

        .card-intro:hover {
            box-shadow:
                inset 4px 4px 12px var(--shadow-dark),
                inset -4px -4px 12px var(--shadow-light);
        }

        .list-group-item {
            background: var(--cream-bg);
            border: none;
            box-shadow:
                inset 2px 2px 5px var(--shadow-dark),
                inset -2px -2px 5px var(--shadow-light);
            border-radius: 12px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            background: #e9eeff;
        }

        .custom-btn {
            background: linear-gradient(145deg, #e6ebff, #ffffff);
            color: #4f46e5;
            border: none;
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            box-shadow:
                6px 6px 12px #cbd1e6,
                -6px -6px 12px #ffffff;
            transition: all 0.25s ease-in-out;
            text-decoration: none;
        }

        .custom-btn:hover {
            background: #e6eaff;
            color: #3730a3;
            box-shadow:
                4px 4px 10px #c5cce4,
                -4px -4px 10px #ffffff;
            transform: translateY(-1px);
        }

        .custom-btn:active {
            box-shadow:
                inset 4px 4px 8px #c5cce4,
                inset -4px -4px 8px #ffffff;
            transform: scale(0.97);
            color: #2c288f;
        }

        .btn-group-gap a {
            margin-right: 10px;
        }

        h1,
        p,
        h5 {
            color: #333;
        }
    </style>
</head>

<body>

    <!-- HEADER LOGIN/REGISTER -->
    <header class="container py-3 text-end btn-group-gap">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="custom-btn px-4 py-2">
                    <i class="bi bi-speedometer me-1"></i> Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="custom-btn px-4 py-2">
                    <i class="bi bi-person-circle me-1"></i> Login
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="custom-btn px-4 py-2">
                        <i class="bi bi-person-plus-fill me-1"></i> Daftar
                    </a>
                @endif
            @endauth
        @endif
    </header>


    <!-- KONTEN INTRO -->
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-intro text-center">
                    <h1 class="mb-3"><i class="bi bi-hospital me-2"></i>Manajemen Rumah Sakit & Pasien</h1>
                    <p class="lead">
                        Kelola informasi <strong>Rumah Sakit</strong> dan <strong>Pasien</strong> dengan lebih efisien.
                        Aplikasi ini dirancang untuk mempermudah proses pencatatan, pencarian, dan pengelolaan data —
                        semua dalam satu dashboard yang intuitif dan responsif.
                    </p>
                    <p class="lead mt-3">
                        Silakan <strong>Login</strong> jika Anda sudah memiliki akun, atau <strong>Daftar</strong> untuk
                        mulai
                        menggunakan layanan kami.
                    </p>

                    <hr class="my-4">
                    <h5 class="mb-3 text-secondary">🚀 Fitur yang Bisa Anda Akses Setelah Login:</h5>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item">
                            <i class="bi bi-building me-2 text-primary"></i>
                            Manajemen <strong>Rumah Sakit</strong>: Tambah, ubah, dan hapus data rumah sakit termasuk
                            alamat, email, dan kontak.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-person-badge me-2 text-success"></i>
                            Manajemen <strong>Pasien</strong>: Tersedia relasi langsung ke rumah sakit, pencarian
                            berdasarkan RS, dan penghapusan data via AJAX tanpa reload.
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </main>

</body>

</html>
