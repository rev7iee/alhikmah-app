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

    <style>
        /* MASTER OVERLAY MODAL AL HIKMAH (MATCH BERANDA) */
        .alhikmah-modal-container {
            display: none;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 999999 !important;
            pointer-events: none;
        }

        .alhikmah-modal-container.active {
            display: block !important;
        }

        .alhikmah-modal-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            pointer-events: auto;
        }

        .alhikmah-modal-card {
            position: fixed !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            background: #ffffff !important;
            border-radius: 12px !important;
            width: 92%;
            max-width: 820px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4) !important;
            display: flex;
            flex-direction: column;
            border: none !important;
            overflow: hidden;
            pointer-events: auto;
            animation: alhikmahBounce 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .alhikmah-modal-header {
            padding: 14px 20px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
        }

        .alhikmah-modal-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: #212529;
            margin: 0;
        }

        .alhikmah-modal-body {
            padding: 0 !important;
            background-color: #000000;
        }

        .alhikmah-modal-footer {
            padding: 14px 20px;
            border-top: 1px solid #dee2e6;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        @keyframes alhikmahBounce {
            from {
                opacity: 0;
                transform: translate(-50%, -47%);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }
    </style>
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
                class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill small fw-bold text-uppercase">Dokumentasi
                Audio-Visual</span>
            <h2 class="fw-bold text-dark mt-2">Galeri Video Al Hikmah</h2>
            <p class="text-muted">Simak liputan kegiatan, ceramah, dan profil pesantren secara interaktif.</p>
        </div>

        <div class="row g-4">
            @forelse($videos as $vid)
                @php
                    preg_match(
                        '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                        $vid->file_or_link,
                        $matches,
                    );
                    $ytId = $matches[1] ?? '';
                    $thumbUrl = $ytId
                        ? "https://img.youtube.com/vi/{$ytId}/hqdefault.jpg"
                        : 'https://placehold.co/600x400?text=Video+Al+Hikmah';
                @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        <div class="position-relative d-flex align-items-center justify-content-center overflow-hidden"
                            style="height: 210px; cursor: pointer;"
                            onclick="openVideoModal('{{ $vid->file_or_link }}', '{{ addslashes($vid->title) }}', '{{ addslashes($vid->caption ?? '') }}')">
                            <!-- THUMBNAIL OTOMATIS DARI YOUTUBE -->
                            <img src="{{ $thumbUrl }}" class="w-100 h-100 position-absolute"
                                style="object-fit: cover; filter: brightness(0.85);">
                            <i class="bi bi-play-circle-fill text-danger display-4 position-relative"
                                style="z-index: 2;"></i>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold text-dark mb-2">{{ $vid->title }}</h5>
                                <p class="text-secondary small mb-0 line-clamp-2">
                                    {{ \Str::limit($vid->caption, 80) ?? 'Video dokumentasi resmi Al Hikmah.' }}
                                </p>
                            </div>
                            <button type="button"
                                class="btn btn-sm btn-outline-danger rounded-pill px-3 mt-3 w-100 fw-medium"
                                onclick="openVideoModal('{{ $vid->file_or_link }}', '{{ addslashes($vid->title) }}', '{{ addslashes($vid->caption ?? '') }}')">
                                <i class="bi bi-play-fill me-1"></i> Tonton Video
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted">Belum ada koleksi video yang diunggah.</div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">{{ $videos->links('pagination::bootstrap-5') }}</div>
    </main>

    <!-- MASTER OVERLAY MODAL VIDEO AL HIKMAH (FIXED SAMA SEPERTI BERANDA) -->
    <div id="alhikmahVideoOverlay" class="alhikmah-modal-container">
        <div class="alhikmah-modal-backdrop" onclick="closeVideoModal()"></div>
        <div class="card alhikmah-modal-card">
            <div class="alhikmah-modal-header">
                <h5 class="alhikmah-modal-title" id="videoModalTitle"><i
                        class="bi bi-play-circle-fill text-danger me-2"></i> Pemutar Video</h5>
                <button type="button" class="btn-close" onclick="closeVideoModal()"></button>
            </div>
            <div class="alhikmah-modal-body">
                <div class="ratio ratio-16x9">
                    <iframe id="videoIframe" src="" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="alhikmah-modal-footer">
                <div class="w-100">
                    <span class="small fw-bold text-dark d-block mb-1">Keterangan Video:</span>
                    <p id="videoModalCaption" class="text-secondary small mb-0"
                        style="line-height: 1.5; max-height: 100px; overflow-y: auto; white-space: pre-line;"></p>
                </div>
                <div class="w-100 text-end mt-2">
                    <button type="button" class="btn btn-secondary px-4 py-2 small rounded-3"
                        onclick="closeVideoModal()" style="font-weight: 500;">Tutup</button>
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
        const videoModal = document.getElementById('alhikmahVideoOverlay');
        const videoIframe = document.getElementById('videoIframe');

        function openVideoModal(rawUrl, title, caption) {
            let embedUrl = "";
            let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            let match = rawUrl.match(regExp);

            if (match && match[2].length === 11) {
                embedUrl = 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1';
            } else {
                embedUrl = rawUrl;
            }

            document.getElementById('videoModalTitle').innerText = title;
            document.getElementById('videoModalCaption').innerText = caption || 'Tidak ada keterangan tambahan.';
            videoIframe.setAttribute('src', embedUrl);

            videoModal.classList.add('active');
        }

        function closeVideoModal() {
            videoModal.classList.remove('active');
            videoIframe.setAttribute('src', '');
        }
    </script>
</body>

</html>
