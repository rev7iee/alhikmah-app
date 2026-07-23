<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings['program_' . $id . '_title'] ?? 'Detail Program' }} - Al Hikmah</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body style="background-color: #f8fafc">

    <!-- TOP BAR & NAVBAR -->
    <div class="top-bar text-center py-2 px-3">
        <span>{{ $settings['top_announcement'] ?? 'Penerimaan Santri Baru Tahun Ajaran 2026/2027 Telah Dibuka!' }}</span>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo_header_alhikmah.png') }}" alt="Logo Al Hikmah"
                    class="logo-navbar me-2" />
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-4">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
                <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
            </div>
        </div>
    </nav>

    <!-- CONTENT DETAIL PROGRAM -->
    <main class="container my-5 py-3">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border">
                    <span class="badge bg-success mb-3 px-3 py-2 text-uppercase fw-semibold">Program Unggulan
                        0{{ $id }}</span>
                    <h1 class="fw-bold text-dark mb-4 display-6">
                        {{ $settings['program_' . $id . '_title'] ?? 'Program Unggulan' }}</h1>

                    <div class="text-secondary leading-relaxed" style="line-height: 1.8; text-align: justify;">
                        {!! $settings['program_' . $id . '_desc'] ?? 'Deskripsi lengkap program belum diisi.' !!}
                    </div>

                    <hr class="my-5 opacity-25" />

                    <a href="{{ url('/') }}" class="btn btn-outline-success rounded-pill px-4">
                        <i class="bi bi-arrow-left me-2"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="main-footer pt-5 pb-3">
        <div class="container text-center text-secondary small">
            <p>&copy; 2026 Pondok Pesantren Al Hikmah. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
