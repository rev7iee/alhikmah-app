<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda - Al Hikmah</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- Bootstrap 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- Custom CSS Eksternal Milikmu -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <!-- ========================================================================= -->
    <!-- CSS SYSTEM: AL HIKMAH MODAL OVERLAY (RESPONSIVE AUTO-FIT CONTENT)        -->
    <!-- ========================================================================= -->
    <style>
        /* Menetralkan transform pada body agar tidak merusak position: fixed modal */
        body {
            animation: none !important;
            transform: none !important;
            overflow-x: hidden;
        }

        /* Memindahkan animasi fade-in halaman ke wrapper khusus */
        #page-wrapper {
            animation: fadeInAnimation ease 0.4s forwards;
        }

        /* MASTER STYLING POP-UP BANNER & VIDEO */
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
            background-color: rgba(0, 0, 0, 0.5);
            pointer-events: auto;
        }

        .alhikmah-modal-card {
            position: fixed !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            background: #ffffff !important;
            border-radius: 8px !important;
            width: 92%;
            max-width: 600px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3) !important;
            display: flex;
            flex-direction: column;
            border: none !important;
            overflow: hidden;
            pointer-events: auto;
            animation: alhikmahBounce 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        /* Lebar khusus bingkai video profil */
        .alhikmah-video-card {
            max-width: 820px !important;
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

        /* FIX BODY: Menghilangkan scroll bar internal modal */
        .alhikmah-modal-body {
            padding: 12px !important;
            /* Padding diperkecil agar pas */
            background-color: #f8fafc;
            overflow: hidden !important;
            /* Matikan paksa scroll bar modal */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* FIX BANNER: Gambar menyusut proporsional mengikuti bingkai modal putih */
        .alhikmah-modal-body img {
            width: 100% !important;
            height: auto !important;
            max-height: 62vh !important;
            /* Membatasi tinggi gambar murni berdasarkan tinggi layar browser */
            object-fit: contain !important;
            /* Menjaga rasio gambar agar tidak pecah/melar */
            border-radius: 4px;
        }

        /* FIX VIDEO: Mengunci wadah 16:9 agar patuh pada lebar kartu putih */
        .alhikmah-modal-body .ratio-16x9 {
            width: 100% !important;
            height: 0 !important;
            padding-bottom: 56.25% !important;
            /* Formula matematis aspek rasio video YouTube */
            position: relative !important;
        }

        .alhikmah-modal-body iframe {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            border-radius: 4px;
        }

        .alhikmah-modal-footer {
            padding: 12px 20px;
            border-top: 1px solid #dee2e6;
            display: flex;
            justify-content: flex-end;
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
    </style>
</head>

<body>

    <!-- Pembungkus Efek Animasi Fade In Halaman Agar Tidak Merusak Posisi Modal -->
    <div id="page-wrapper">

        <!-- ========================================================================= -->
        <!-- 1. TOP ANNOUNCEMENT BAR (Poin 1 Dinamis)                                  -->
        <!-- ========================================================================= -->
        <div class="top-bar text-center py-2 px-3">
            <span>{{ $settings['top_announcement'] ?? 'Penerimaan Santri Baru Tahun Ajaran 2026/2027 Telah Dibuka!' }}</span>
        </div>

        <!-- ========================================================================= -->
        <!-- 2. NAVBAR                                                                 -->
        <!-- ========================================================================= -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo-header.png') }}" alt="Logo Al Hikmah"
                        class="logo-navbar me-2" onerror="this.src='https://via.placeholder.com/40?text=Logo'" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                    </ul>
                    <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
                </div>
            </div>
        </nav>

        <!-- ========================================================================= -->
        <!-- 3. HERO SECTION & VIDEO TRIGGER (Poin 3)                                  -->
        <!-- ========================================================================= -->
        <header class="hero-section d-flex align-items-center">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8">
                        <span class="badge bg-success mb-3 px-3 py-2 text-uppercase fw-semibold"
                            style="letter-spacing: 1px; font-size: 0.75rem">Pondok Pesantren Modern</span>
                        <h1 class="display-4 fw-bold mb-4">Membentuk Generasi Qurani yang Berakhlakul Karimah</h1>
                        <p class="lead mb-4 opacity-90">Al Hikmah menggabungkan tradisi salaf yang kuat dengan kurikulum
                            modern berkualitas untuk mencetak cendekiawan Muslim yang unggul secara intelektual dan
                            spiritual.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#" class="btn btn-accent px-4 py-2">Pelajari Lebih Lanjut</a>

                            <!-- SINKRONISASI ID: ID Diubah Menjadi triggerCustomVideoBtn Sesuai Skrip JS -->
                            @if (!empty($settings['video_profil_url']))
                                <button type="button"
                                    class="btn btn-outline-custom px-4 py-2 d-flex align-items-center"
                                    id="triggerCustomVideoBtn">
                                    <i class="bi bi-play-circle me-2 fs-5"></i> Tonton Profil Video
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========================================================================= -->
        <!-- 4. PROGRAM UNGGULAN KAMI (Poin 4 Dinamis)                                 -->
        <!-- ========================================================================= -->
        <section class="py-5 bg-white">
            <div class="container py-3">
                <div class="mb-5">
                    <h2 class="fw-bold text-dark">Program Unggulan Kami</h2>
                    <p class="text-muted mb-0">Kurikulum yang dirancang khusus untuk mengoptimalkan potensi intelektual,
                        emosional, dan spiritual setiap santri.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="card h-100 border-0 shadow-sm p-4 d-flex flex-column justify-content-end text-dark rounded-4"
                            style="background: linear-gradient(rgba(245, 245, 245, 0.88), rgba(245, 245, 245, 0.88)), 
                            url('{{ !empty($settings['program_1_image']) ? asset('assets/images/' . $settings['program_1_image']) : asset('assets/images/program-beranda.jpg') }}') no-repeat center center/cover; min-height: 240px;">
                            <div>
                                <h4 class="fw-bold text-dark">{{ $settings['program_1_title'] ?? "Tahfidhul Qur'an" }}
                                </h4>
                                <p class="mb-0 text-secondary w-75">
                                    {{ $settings['program_1_desc'] ?? 'Metode menghafal Al-Qur\'an teruji dengan target mutqin, fokus pada tajwid dan pemahaman makna.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 bg-success text-white d-flex flex-column justify-content-between rounded-4"
                            style="background-color: var(--light-green) !important;">
                            <div class="fs-2 mb-3"><i class="bi bi-book text-warning"></i></div>
                            <div>
                                <h4 class="fw-bold">{{ $settings['program_2_title'] ?? 'Kajian Kitab Kuning' }}</h4>
                                <p class="mb-0 opacity-90 text-white-50 small">
                                    {{ $settings['program_2_desc'] ?? 'Pendalaman literatur klasik Islam dengan metodologi kritis untuk menjawab tantangan zaman.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 d-flex flex-column justify-content-between rounded-4"
                            style="background-color: var(--bg-blue-light) !important;">
                            <div class="fs-2 mb-3 text-primary"><i class="bi bi-translate"></i></div>
                            <div>
                                <h4 class="fw-bold text-dark">{{ $settings['program_3_title'] ?? 'Bilingual Mastery' }}
                                </h4>
                                <p class="mb-0 text-secondary small">
                                    {{ $settings['program_3_desc'] ?? 'Penguasaan bahasa Arab dan Inggris sebagai alat utama komunikasi global dan kajian Islam.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card h-100 border-0 shadow-sm p-4 bg-white d-flex flex-column justify-content-center rounded-4"
                            style="border: 1px solid #e2e8f0 !important;">
                            <div class="row align-items-center">
                                <div class="col-sm-2 d-none d-sm-block text-center fs-1 text-success opacity-50"><i
                                        class="bi bi-cpu"></i></div>
                                <div class="col-sm-10">
                                    <h4 class="fw-bold text-dark">
                                        {{ $settings['program_4_title'] ?? 'Sains & Teknologi' }}</h4>
                                    <p class="mb-0 text-secondary">
                                        {{ $settings['program_4_desc'] ?? 'Integrasi ilmu alam dan teknologi digital dalam bingkai etika keislaman yang kuat.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- 5. STATISTIK BAR                                                          -->
        <!-- ========================================================================= -->
        <section class="stats-bar text-center">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-3 col-6">
                        <h2 class="display-6 stat-number">1,200+</h2>
                        <p class="small text-uppercase mb-0 text-white-50">Santri Aktif</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <h2 class="display-6 stat-number">150+</h2>
                        <p class="small text-uppercase mb-0 text-white-50">Pengajar & Staff</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <h2 class="display-6 stat-number">45</h2>
                        <p class="small text-uppercase mb-0 text-white-50">Prestasi Nasional</p>
                    </div>
                    <div class="col-md-3 col-6">
                        <h2 class="display-6 stat-number">98%</h2>
                        <p class="small text-uppercase mb-0 text-white-50">Lulusan PTN</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- 6. PRESTASI & KABAR TERKINI                                               -->
        <!-- ========================================================================= -->
        <section class="py-5 bg-light">
            <div class="container py-3">
                <h2 class="fw-bold text-center text-dark mb-5">Kabar Terkini</h2>
                <div class="row g-4">
                    @forelse($recentPosts as $post)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-4">
                                <img src="{{ asset('assets/images/news/' . $post->thumbnail) }}" class="card-img-top"
                                    alt="{{ $post->title }}" style="height: 200px; object-fit: cover;"
                                    onerror="this.src='https://via.placeholder.com/350x200?text=News+Al+Hikmah'" />
                                <div class="card-body p-4 d-flex flex-column justify-content-between">
                                    <div>
                                        <span class="text-uppercase text-success fw-bold d-block mb-2"
                                            style="font-size: 0.72rem; letter-spacing: 0.5px;">{{ $post->category }}</span>
                                        <h5 class="card-title fw-bold text-dark mb-3 text-truncate-2"
                                            style="line-height: 1.4; font-size: 1.05rem;">{{ $post->title }}</h5>
                                        <p class="card-text text-secondary small mb-3">
                                            {{ \Str::limit(strip_tags($post->content), 110) }}
                                        </p>
                                    </div>
                                    <a href="{{ url('/blog/detail/' . $post->id) }}"
                                        class="text-success fw-semibold text-decoration-none small d-inline-flex align-items-center gap-1 mt-2">
                                        Baca Selengkapnya <i class="bi bi-chevron-right"
                                            style="font-size: 0.7rem"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4">
                            <p class="text-muted small">Belum ada publikasi kabar terbaru saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- 7. KUNJUNGI KAMPUS KAMI                                                   -->
        <!-- ========================================================================= -->
        <section class="py-5 campus-section">
            <div class="container py-4">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-4 text-dark">Kunjungi Ponpes Kami</h2>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex align-items-start mb-3">
                                <i class="bi bi-geo-alt text-success fs-5 me-3 mt-1"></i>
                                <span
                                    style="line-height: 1.5;">{{ $settings['pondok_address'] ?? 'Jl. Raya Al Hikmah No. 123, Indonesia' }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-telephone text-success fs-5 me-3"></i>
                                <span>{{ $settings['pondok_phone'] ?? '+62 812-3456-7890' }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="bi bi-envelope text-success fs-5 me-3"></i>
                                <span>{{ $settings['pondok_email'] ?? 'info@alhikmah.sch.id' }}</span>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                            <a href="https://youtube.com/@ilmuwantop1?si=jz6DjDcqCM2OEVaZ" target="_blank"
                                class="social-icon"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ !empty($settings['pondok_campus_image']) ? asset('assets/images/' . $settings['pondok_campus_image']) : 'https://placehold.co/600x350?text=Kampus+Al+Hikmah' }}"
                            alt="Foto Kampus Al Hikmah" class="img-fluid rounded-4 shadow-sm w-100"
                            style="max-height: 350px; object-fit: cover;" />
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- 8. FOOTER -->
        <!-- ========================================================================= -->
        <footer class="main-footer pt-5 pb-3">
            <div class="container">
                <div class="row g-4 mb-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <!-- COMMENT UNTUK KODE GAMBAR LOGO FOOTER -->
                            <img src="assets/images/logo-header.png" alt="Logo" class="logo-footer me-2" />
                        </div>
                        <p class="small text-secondary">
                            Mewujudkan pondok pesantren Islam yang integratif, modern, dan
                            berwawasan global.
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <h6 class="fw-bold mb-3">Pendidikan</h6>
                        <ul class="list-unstyled small d-grid gap-2">
                            <li>
                                <a href="#" class="text-secondary text-decoration-none">Curriculum</a>
                            </li>
                            <li>
                                <a href="#" class="text-secondary text-decoration-none">Registration</a>
                            </li>
                            <li>
                                <a href="#" class="text-secondary text-decoration-none">Alumni</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <h6 class="fw-bold mb-3">Tentang</h6>
                        <ul class="list-unstyled small d-grid gap-2">
                            <li>
                                <a href="#" class="text-secondary text-decoration-none">Student Life</a>
                            </li>
                            <li>
                                <a href="#" class="text-secondary text-decoration-none">Contact Us</a>
                            </li>
                            <li>
                                <a href="#" class="text-secondary text-decoration-none">Facilities</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h6 class="fw-bold mb-3">Newsletter</h6>
                        <p class="small text-secondary mb-3">
                            Dapatkan info pendaftaran langsung di email Anda.
                        </p>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email Anda"
                                aria-label="Email Anda" />
                            <button class="btn btn-success" type="button">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <hr class="text-secondary opacity-25" />
                <div class="row pt-2 small text-secondary">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0">
                            &copy; 2026 Pondok Pesantren Al Hikmah. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                        <a href="#" class="text-secondary text-decoration-none me-3">Privacy Policy</a>
                        <a href="#" class="text-secondary text-decoration-none">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>

    </div> <!-- SELESAI WRAPPER HALAMAN -->


    <!-- ========================================================================= -->
    <!-- MASTER MODALS: STRUKTUR AMAN KELAS KUSTOM ALHIKMAH (ANTI CONFLICT SCROLL)  -->
    <!-- ========================================================================= -->

    <!-- Jendela Pop-up 1: Banner Pengumuman Auto Load (Gaya SPMB Jateng) -->
    @if (!empty($settings['popup_banner_image']))
        <div id="alhikmahBannerOverlay" class="alhikmah-modal-container">
            <div class="alhikmah-modal-backdrop"></div>
            <div class="card alhikmah-modal-card">
                <div class="alhikmah-modal-header">
                    <h5 class="alhikmah-modal-title"><i class="bi bi-info-circle-fill text-primary me-2"></i>
                        Informasi Penting</h5>
                    <button type="button" class="btn-close" id="hCloseBannerBtn"></button>
                </div>
                <div class="alhikmah-modal-body text-center">
                    <img src="{{ asset('assets/images/' . $settings['popup_banner_image']) }}"
                        alt="Pengumuman Resmi">
                </div>
                <div class="alhikmah-modal-footer">
                    <button type="button" class="btn btn-secondary px-4 py-2 small rounded-3" id="fCloseBannerBtn"
                        style="font-weight: 500;">Tutup</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Jendela Pop-up 2: Player Video Profil (Gaya SPMB Jateng) -->
    @if (!empty($settings['video_profil_url']))
        <div id="alhikmahVideoOverlay" class="alhikmah-modal-container">
            <div class="alhikmah-modal-backdrop"></div>
            <div class="card alhikmah-modal-card alhikmah-video-card">
                <div class="alhikmah-modal-header">
                    <h5 class="alhikmah-modal-title"><i class="bi bi-play-circle-fill text-success me-2"></i> Video
                        Profil Lembaga</h5>
                    <button type="button" class="btn-close" id="hCloseVideoBtn"></button>
                </div>
                <div class="alhikmah-modal-body bg-dark p-1">
                    <div class="ratio ratio-16x9">
                        <iframe id="alhikmahVideoIframe" src="" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="alhikmah-modal-footer">
                    <button type="button" class="btn btn-secondary px-4 py-2 small rounded-3" id="fCloseVideoBtn"
                        style="font-weight: 500;">Tutup</button>
                </div>
            </div>
        </div>
    @endif


    <!-- Bootstrap 5 Bundle JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS Eksternal Milikmu -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- ========================================================================= -->
    <!-- JAVASCRIPT ENGINE: ALHIKMAH BALANCED VIEWPORT CONTROLLER                  -->
    <!-- ========================================================================= -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Pengendali Buka Jendela Secara Aman
            function openModalEngine(overlayElement) {
                if (!overlayElement) return;
                document.body.appendChild(overlayElement); // Pindahkan ke kasta HTML terluar
                overlayElement.classList.add('active');
            }

            // Pengendali Tutup Jendela Secara Aman
            function closeModalEngine(overlayElement, iframeElement = null) {
                if (overlayElement) {
                    overlayElement.classList.remove('active');
                    if (iframeElement) {
                        iframeElement.setAttribute('src', ''); // Hancurkan link YouTube agar suara mati otomatis
                    }
                }
            }

            // --- 1. BANNER INFORMASI AUTOMATIC LOAD DI REFRESH ---
            const bannerModal = document.getElementById('alhikmahBannerOverlay');
            const hCloseBanner = document.getElementById('hCloseBannerBtn');
            const fCloseBanner = document.getElementById('fCloseBannerBtn');

            if (bannerModal) {
                setTimeout(function() {
                    openModalEngine(bannerModal);
                }, 300);

                if (hCloseBanner) hCloseBanner.addEventListener('click', () => closeModalEngine(bannerModal));
                if (fCloseBanner) fCloseBanner.addEventListener('click', () => closeModalEngine(bannerModal));

                bannerModal.querySelector('.alhikmah-modal-backdrop').addEventListener('click', () => {
                    closeModalEngine(bannerModal);
                });
            }

            // --- 2. POP-UP PLAYER VIDEO PROFIL KAMPUS ---
            const triggerVideoBtn = document.getElementById(
                'triggerCustomVideoBtn'); // FIXED: ID Sesuai dengan HTML Tombol di Atas
            const videoModal = document.getElementById('alhikmahVideoOverlay');
            const hCloseVideo = document.getElementById('hCloseVideoBtn');
            const fCloseVideo = document.getElementById('fCloseVideoBtn');
            const videoIframe = document.getElementById('alhikmahVideoIframe');

            if (videoModal && videoIframe) {
                // Ekstraksi Tautan Biasa ke bentuk Embed URL Player
                let rawUrl = "{!! $settings['video_profil_url'] ?? '' !!}";
                let embedUrl = "";
                let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                let match = rawUrl.match(regExp);

                if (match && match[2].length === 11) {
                    embedUrl = 'https://www.youtube.com/embed/' + match[2];
                } else {
                    embedUrl = rawUrl;
                }

                // Klik tombol tonton video profil
                if (triggerVideoBtn) {
                    triggerVideoBtn.addEventListener('click', function() {
                        openModalEngine(videoModal);
                        videoIframe.setAttribute('src', embedUrl + "?autoplay=1");
                    });
                }

                // Klik tombol tutup video
                if (hCloseVideo) hCloseVideo.addEventListener('click', () => closeModalEngine(videoModal,
                    videoIframe));
                if (fCloseVideo) fCloseVideo.addEventListener('click', () => closeModalEngine(videoModal,
                    videoIframe));

                // Menutup video jika area hitam backdrop diklik
                videoModal.querySelector('.alhikmah-modal-backdrop').addEventListener('click', () => {
                    closeModalEngine(videoModal, videoIframe);
                });
            }
        });
    </script>
</body>

</html>
