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

    <style>
        body {
            animation: none !important;
            transform: none !important;
            overflow-x: hidden;
        }

        #page-wrapper {
            animation: fadeInAnimation ease 0.4s forwards;
        }

        /* HOVER CARD GALLERI FOTO */
        .card-gallery-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08) !important;
        }

        /* MASTER MODAL OVERLAY FIXED AL HIKMAH */
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
            background-color: rgba(0, 0, 0, 0.65);
            pointer-events: auto;
            backdrop-filter: blur(4px);
        }

        .alhikmah-modal-card {
            position: fixed !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            background: #ffffff !important;
            border-radius: 16px !important;
            width: 92%;
            max-width: 900px;
            max-height: 85vh;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4) !important;
            display: flex;
            flex-direction: column;
            border: none !important;
            overflow: hidden;
            pointer-events: auto;
            animation: alhikmahBounce 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .alhikmah-modal-header {
            padding: 14px 24px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
        }

        .alhikmah-modal-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: #0f172a;
            margin: 0;
        }

        /* LAYOUT HORIZONTAL DUA KOLOM */
        .alhikmah-modal-body-split {
            display: flex;
            flex-direction: row;
            height: 100%;
            max-height: calc(85vh - 60px);
            overflow: hidden;
            background-color: #ffffff;
        }

        /* SISI KIRI: EFEK BLURRED BACKGROUND (ELEGANT FULL CONTAINER) */
        .modal-col-media-blur {
            flex: 1.2;
            position: relative;
            overflow: hidden;
            background-color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            min-height: 320px;
        }

        .modal-col-media-blur .bg-blur-image {
            position: absolute;
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            object-fit: cover;
            filter: blur(25px) brightness(0.5);
            opacity: 0.85;
            z-index: 1;
        }

        .modal-col-media-blur .main-foreground-image {
            position: relative;
            z-index: 2;
            max-width: 100%;
            max-height: 60vh;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        /* SISI KANAN: TEXT & SCROLLABLE CAPTION */
        .modal-col-text {
            flex: 1;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: auto;
            background-color: #ffffff;
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

        @media (max-width: 767.98px) {
            .alhikmah-modal-card {
                max-height: 90vh;
            }

            .alhikmah-modal-body-split {
                flex-direction: column;
                overflow-y: auto;
            }

            .modal-col-media-blur {
                min-height: 220px;
            }

            .modal-col-media-blur .main-foreground-image {
                max-height: 35vh;
            }
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <div id="page-wrapper">
        <!-- TOPBAR & NAVBAR -->
        <div class="top-bar text-center py-2 px-3">
            <span>{{ $settings['top_announcement'] ?? 'Penerimaan Santri Baru Telah Dibuka!' }}</span>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img
                        src="{{ asset('assets/images/logo_header_alhikmah.png') }}" class="logo-navbar"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
                    class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill small fw-bold text-uppercase">Dokumentasi
                    Visual</span>
                <h2 class="fw-bold text-dark mt-2">Galeri Foto Kegiatan</h2>
                <p class="text-muted">Potret aktivitas santri dan momentum penting di Pondok Pesantren Al Hikmah.</p>
            </div>

            <!-- SEARCH & FILTER BAR -->
            <form action="{{ url('/galeri') }}" method="GET" class="mb-5">
                <div class="row g-3 justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="input-group shadow-sm rounded-3 overflow-hidden">
                            <span class="input-group-text bg-white border-end-0 ps-3 text-muted"><i
                                    class="bi bi-search"></i></span>
                            <input type="text" name="keyword" class="form-control border-start-0 py-2.5"
                                placeholder="Cari judul atau kata kunci foto..." value="{{ request('keyword') }}">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <select name="sort" class="form-select py-2.5 shadow-sm rounded-3 text-secondary"
                            onchange="this.form.submit()">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru Diunggah
                            </option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama Diunggah
                            </option>
                        </select>
                    </div>
                    @if (request('keyword') || request('sort'))
                        <div class="col-auto">
                            <a href="{{ url('/galeri') }}" class="btn btn-outline-secondary py-2.5 px-3 rounded-3"
                                title="Reset Filter"><i class="bi bi-arrow-counterclockwise me-1"></i> Reset</a>
                        </div>
                    @endif
                </div>
            </form>

            <div class="row g-4">
                @forelse($photos as $photo)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white card-gallery-item">
                            <div class="ratio ratio-4x3" style="cursor: pointer;"
                                onclick="openPhotoModal('{{ asset('assets/images/gallery/' . $photo->file_or_link) }}', '{{ addslashes($photo->title) }}', '{{ addslashes($photo->caption ?? '') }}')">
                                <img src="{{ asset('assets/images/gallery/' . $photo->file_or_link) }}"
                                    style="object-fit:cover;" alt="{{ $photo->title }}">
                            </div>
                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">{{ $photo->title }}</h5>
                                    <p class="text-secondary small mb-0 opacity-75">
                                        {{ \Str::limit($photo->caption, 80) ?? 'Dokumentasi resmi Al Hikmah.' }}
                                    </p>
                                </div>

                                <!-- POIN 2: TOMBOL DENGAN ICON SAMA SEPERTI HALAMAN VIDEO -->
                                <button type="button"
                                    class="btn btn-sm btn-outline-success rounded-pill px-3 mt-3 w-100 fw-medium d-flex align-items-center justify-content-center gap-1"
                                    onclick="openPhotoModal('{{ asset('assets/images/gallery/' . $photo->file_or_link) }}', '{{ addslashes($photo->title) }}', '{{ addslashes($photo->caption ?? '') }}')">
                                    <i class="bi bi-eye-fill"></i> Lihat Selengkapnya
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">Belum ada foto galeri yang diunggah.</div>
                @endforelse
            </div>

            <div class="mt-5 d-flex justify-content-center">{{ $photos->links('pagination::bootstrap-5') }}</div>
        </main>

        <!-- ========================================================================= -->
        <!-- 8. FOOTER                                                                 -->
        <!-- ========================================================================= -->
        <footer class="main-footer pt-5 pb-3">
            <div class="container">
                <div class="row pt-2 small text-secondary">
                    <div class="col-md-12 text-center">
                        <p class="mb-0">&copy; 2026 Pondok Pesantren Al Hikmah. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- ========================================================================= -->
    <!-- POIN 1: MASTER OVERLAY MODAL FOTO WITH FROSTED BLUR BACKGROUND           -->
    <!-- ========================================================================= -->
    <div id="alhikmahPhotoOverlay" class="alhikmah-modal-container">
        <div class="alhikmah-modal-backdrop" onclick="closePhotoModal()"></div>
        <div class="card alhikmah-modal-card">
            <div class="alhikmah-modal-header">
                <h5 class="alhikmah-modal-title"><i class="bi bi-image text-success me-2"></i> Dokumentasi Foto</h5>
                <button type="button" class="btn-close" onclick="closePhotoModal()"></button>
            </div>
            <div class="alhikmah-modal-body-split">
                <!-- KANVAS KIRI: BLURRED FROSTED BACKGROUND + UTAMA -->
                <div class="modal-col-media-blur">
                    <img id="modalPhotoImageBlur" class="bg-blur-image" src="" alt="Background Blur">
                    <img id="modalPhotoImage" class="main-foreground-image" src="" alt="Pratinjau Foto">
                </div>
                <!-- KANVAS KANAN: DESKRIPSI TEKS BISA DI-SCROLL MANDIRI -->
                <div class="modal-col-text">
                    <div>
                        <span
                            class="badge bg-success bg-opacity-10 text-success mb-2 px-3 py-1.5 rounded-pill small fw-bold">Postingan
                            Galeri</span>
                        <h4 class="fw-bold text-dark mb-3" id="modalPhotoTitle" style="line-height: 1.4;"></h4>
                        <hr class="my-3 opacity-25">
                        <span class="small fw-bold text-dark d-block mb-2">Keterangan Foto:</span>
                        <p id="modalPhotoCaption" class="text-secondary small mb-4"
                            style="line-height: 1.7; white-space: pre-line; text-align: justify;"></p>
                    </div>
                    <div class="pt-3 border-top text-end">
                        <button type="button" class="btn btn-secondary px-4 py-2 small rounded-3"
                            onclick="closePhotoModal()" style="font-weight: 500;">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const photoModal = document.getElementById('alhikmahPhotoOverlay');

        function openPhotoModal(imageUrl, title, caption) {
            document.getElementById('modalPhotoImage').src = imageUrl;
            document.getElementById('modalPhotoImageBlur').src = imageUrl;
            document.getElementById('modalPhotoTitle').innerText = title;
            document.getElementById('modalPhotoCaption').innerText = caption || 'Tidak ada keterangan tambahan.';

            document.body.appendChild(photoModal);
            photoModal.classList.add('active');
        }

        function closePhotoModal() {
            photoModal.classList.remove('active');
            document.getElementById('modalPhotoImage').src = '';
            document.getElementById('modalPhotoImageBlur').src = '';
        }
    </script>
</body>

</html>
