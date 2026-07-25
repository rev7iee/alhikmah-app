<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Video - Al Hikmah Boarding School</title>
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/video') }}">Video</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
                <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
            </div>
        </div>
    </nav>

    <!-- CONTAINER VIDEO -->
    <main class="container my-5 py-3">
        <div class="text-center mb-5">
            <span
                class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill small fw-bold uppercase">Dokumentasi
                Audio-Visual</span>
            <h2 class="fw-bold text-dark mt-2">Galeri Video Al Hikmah</h2>
            <p class="text-muted">Simak liputan video liputan kegiatan, ceramah, dan profil pesantren.</p>
        </div>

        <div class="row g-4">
            @forelse($videos as $vid)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        <div class="position-relative bg-dark d-flex align-items-center justify-content-center"
                            style="height:200px;">
                            <i class="bi bi-play-circle-fill text-danger display-4 position-absolute style-play"
                                style="z-index:2; cursor:pointer;"
                                onclick="playVideo('{{ $vid->file_or_link }}', '{{ $vid->title }}')"></i>
                            <div class="w-100 h-100 bg-secondary opacity-50"></div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-dark mb-1">{{ $vid->title }}</h5>
                            <p class="text-secondary small mb-0">{{ $vid->caption ?? 'Video dokumentasi resmi.' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">Belum ada koleksi video yang diunggah.</div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">{{ $videos->links('pagination::bootstrap-5') }}</div>
    </main>

    <!-- MODAL POPUP FRAME PLAYER VIDEO -->
    <div class="modal fade" id="videoPlayerModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 overflow-hidden">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="videoModalTitle">Play Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="stopVideo()"></button>
                </div>
                <div class="modal-body p-0 bg-dark">
                    <div class="ratio ratio-16x9">
                        <iframe id="videoIframe" src="" allowfullscreen allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="main-footer pt-5 pb-3 bg-white border-top">
        <div class="container text-center text-secondary small">
            <p>&copy; 2026 Pondok Pesantren Al Hikmah. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function playVideo(rawUrl, title) {
            let embedUrl = "";
            let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            let match = rawUrl.match(regExp);

            if (match && match[2].length === 11) {
                embedUrl = 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1';
            } else {
                embedUrl = rawUrl;
            }

            document.getElementById('videoModalTitle').innerText = title;
            document.getElementById('videoIframe').src = embedUrl;

            let modal = new bootstrap.Modal(document.getElementById('videoPlayerModal'));
            modal.show();
        }

        function stopVideo() {
            document.getElementById('videoIframe').src = '';
        }
    </script>
</body>

</html>
