<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .floating-label {
            position: absolute;
            top: 1rem;
            left: 4rem;
            font-size: 1rem;
            color: #6c757d;
            pointer-events: none;
            background-color: white;
            padding: 0 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            transition: all 0.2s ease-in-out;
            z-index: 1;
        }

        .textarea-floatinglabel {
            position: absolute;
            top: 1.7rem;
            left: 4rem;
            font-size: 1rem;
            color: #6c757d;
            pointer-events: none;
            background-color: white;
            padding: 0 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            transition: all 0.2s ease-in-out;
            z-index: 1;
        }

        .floating-input:focus+.floating-label,
        .floating-input.has-value+.floating-label {
            top: -0.65rem;
            left: 2.75rem;
            font-size: 0.8rem;
            color: #0d6efd;
        }

        .floating-input:focus+.textarea-floatinglabel,
        .floating-input.has-value+.textarea-floatinglabel {
            top: -0.65rem;
            left: 2.75rem;
            font-size: 0.8rem;
            color: #0d6efd;
        }

        .floating-group {
            position: relative;
        }

        .floating-input {
            height: 3.5rem;
            padding: 1rem 1rem 0.5rem 3.5rem;
            font-size: 1rem;
            border: 2px solid #ced4da;
            border-radius: 0.75rem;
            background-color: white;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .floating-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.15);
        }

        .floating-icon {
            position: absolute;
            top: 50%;
            left: 2rem;
            transform: translateY(-50%);
            font-size: 1.1rem;
            z-index: 2;
        }

        textarea.floating-input {
            height: auto;
            min-height: 5rem;
            padding-top: 1.5rem;
        }

        .swal2-container.swal2-container {
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    <script>
        // efek label dan penyesuaian inputan
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".floating-input").forEach(function(input) {
                const updateState = () => {
                    if (input.value.trim() !== "") {
                        input.classList.add("has-value");
                    } else {
                        input.classList.remove("has-value");
                    }
                };
                updateState();
                input.addEventListener("input", updateState);
                input.addEventListener("blur", updateState);
            });
        });

        // konfir hapus
        $(document).on("click", ".btn-delete", function() {
            const url = $(this).data("url");

            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                backdrop: `rgba(0,0,0,0.4)`,
                willOpen: () => {
                    document
                        .querySelector(".swal2-container")
                        ?.classList.add("swal-blur");
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _method: "DELETE",
                            _token: "{{ csrf_token() }}",
                        },
                        success: function() {
                            Swal.fire({
                                title: "Terhapus!",
                                text: "Data berhasil dihapus.",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false,
                                background: "#fff",
                                backdrop: "rgba(0, 0, 0, 0.3)",
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Gagal menghapus data. Coba lagi nanti.",
                                icon: "error",
                                confirmButtonColor: "#d33",
                                background: "#fff",
                                backdrop: "rgba(0,0,0,0.4)",
                            });
                        },
                    });
                }
            });
        });
    </script>
</body>

</html>
