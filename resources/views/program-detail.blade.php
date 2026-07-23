<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings['program_' . $id . '_title'] ?? 'Detail Program' }} - Al Hikmah Boarding School</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <style>
        body {
            animation: none !important;
            transform: none !important;
        }

        #page-wrapper {
            animation: fadeInAnimation ease 0.4s forwards;
        }
    </style>
</head>

<body style="background-color: #f8fafc">

    <div id="page-wrapper">

        <!-- TOP BAR -->
        <div class="top-bar text-center py-2 px-3">
            <span>{{ $settings['top_announcement'] ?? 'Penerimaan Santri Baru Tahun Ajaran 2026/2027 Telah Dibuka!' }}</span>
        </div>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo_header_alhikmah.png') }}" alt="Logo Al Hikmah"
                        class="logo-navbar me-2" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                    </ul>
                    <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
                </div>
            </div>
        </nav>

        <!-- HEADER HERO BACKGROUND (SAMA PERSIS BLOG-DETAIL) -->
        <header class="container my-4">
            <div class="position-relative rounded-4 overflow-hidden shadow-sm" style="min-height: 400px">
                <img src="{{ !empty($settings['program_' . $id . '_image']) ? asset('assets/images/' . $settings['program_' . $id . '_image']) : 'https://via.placeholder.com/1200x500?text=Program+Unggulan+Al+Hikmah' }}"
                    alt="{{ $settings['program_' . $id . '_title'] ?? 'Program Unggulan' }}"
                    class="position-absolute w-100 h-100" style="object-fit: cover; z-index: 1"
                    onerror="this.src='https://via.placeholder.com/1200x500?text=Program+Unggulan+Al+Hikmah'" />

                <!-- GRADIENT OVERLAY HIJAU-HITAM ELEGANT -->
                <div class="position-absolute w-100 h-100"
                    style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.25), rgba(10, 77, 38, 0.92)); z-index: 2;">
                </div>

                <!-- TEKS OVERLAY HEADER -->
                <div class="position-absolute bottom-0 start-0 p-4 p-md-5 text-white"
                    style="z-index: 3; max-width: 850px">
                    <span class="badge bg-success mb-3 px-3 py-2 text-uppercase fw-semibold"
                        style="letter-spacing: 0.5px; font-size: 0.75rem">Program Unggulan 0{{ $id }}</span>
                    <h1 class="fw-bold display-6 mt-2" style="line-height: 1.3">
                        {{ $settings['program_' . $id . '_title'] ?? 'Program Unggulan' }}
                    </h1>
                </div>
            </div>
        </header>

        <!-- MAIN NARASI DETAIL PROGRAM -->
        <main class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                        <!-- ISI TEXT EDITOR DARI ADMIN -->
                        <div class="text-secondary mb-4 ck-content"
                            style="line-height: 1.8; text-align: justify; font-size: 1.02rem;">
                            {!! $settings['program_' . $id . '_desc'] ??
                                '<p class="text-muted">Deskripsi lengkap program belum diisi oleh administrator.</p>' !!}
                        </div>

                        <hr class="my-4 opacity-25" />

                        <!-- TOMBOL KEMBALI -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('/') }}"
                                class="btn btn-outline-success rounded-pill px-4 py-2 fw-medium small">
                                <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
                            </a>
                            <span
                                class="badge bg-light text-muted border px-3 py-2 rounded-pill small">#AlHikmahProgram</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="main-footer pt-5 pb-3">
            <div class="container">
                <div class="row pt-2 small text-secondary text-center">
                    <div class="col-md-12">
                        <p class="mb-0">&copy; 2026 Pondok Pesantren Al Hikmah. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
