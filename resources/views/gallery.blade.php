<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto - Al Hikmah Boarding School</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body style="background-color: #f8fafc;">

    <!-- TOPBAR & NAVBAR -->
    <div class="top-bar text-center py-2 px-3">
        <span>{{ $settings['top_announcement'] ?? 'Penerimaan Santri Baru Telah Dibuka!' }}</span>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img
                    src="{{ asset('assets/images/logo_header_alhikmah.png') }}" class="logo-navbar"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-4">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/video') }}">Video</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
                <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
            </div>
        </div>
    </nav>

    <!-- CONTAINER FOTO -->
    <main class="container my-5 py-3">
        <div class="text-center mb-5">
            <span
                class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill small fw-bold uppercase">Dokumentasi
                Visual</span>
            <h2 class="fw-bold text-dark mt-2">Galeri Foto Kegiatan</h2>
            <p class="text-muted">Potret aktivitas santri dan momentum penting di Pondok Pesantren Al Hikmah.</p>
        </div>

        <div class="row g-4">
            @forelse($photos as $photo)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('assets/images/gallery/' . $photo->file_or_link) }}"
                                style="object-fit:cover;" alt="{{ $photo->title }}">
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-dark mb-1">{{ $photo->title }}</h5>
                            <p class="text-secondary small mb-0">
                                {{ $photo->caption ?? 'Dokumentasi resmi Al Hikmah.' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">Belum ada foto galeri yang diunggah.</div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">{{ $photos->links('pagination::bootstrap-5') }}</div>
    </main>

    <!-- FOOTER -->
    <footer class="main-footer pt-5 pb-3 bg-white border-top">
        <div class="container text-center text-secondary small">
            <p>&copy; 2026 Pondok Pesantren Al Hikmah. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
