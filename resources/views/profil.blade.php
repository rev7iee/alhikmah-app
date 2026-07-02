<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil - Al Hikmah</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- Bootstrap 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body style="background-color: #f8fafc; overflow-x: hidden;">

    <div class="top-bar text-center py-2 px-3">
        <span>{{ $settings['top_announcement'] ?? 'Penerimaan Santri Baru Tahun Ajaran 2026/2027 Telah Dibuka!' }}</span>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm" style="width: 100%;">
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
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/profil') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
                <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
            </div>
        </div>
    </nav>

    <div id="page-wrapper" style="overflow-x: hidden; width: 100%;">

        <header class="profile-header">
            <div class="container py-4">
                <h1 class="display-5 fw-bold mb-2">Profil Pesantren</h1>
                <p class="lead small opacity-90">
                    Membangun Generasi Qur'ani, Berakhlakul Karimah, dan Berwawasan Global
                </p>
            </div>
        </header>

        <!-- ========================================================================= -->
        <!-- 2. SEJARAH SINGKAT -->
        <!-- ========================================================================= -->
        <section class="py-5 bg-white">
            <div class="container py-4">
                <div class="row align-items-center g-5">
                    <!-- Kolom Teks Kiri -->
                    <div class="col-lg-6">
                        <span class="badge bg-success mb-3 px-3 py-2 text-dark fw-medium"
                            style="
                background-color: #d1e7dd !important;
                color: #0f5132 !important;
                border-radius: 30px;
              ">Tentang
                            Kami</span>
                        <h2 class="fw-bold text-dark mb-4" style="color: #0d3b1e !important">
                            Sejarah Singkat
                        </h2>
                        <p class="text-secondary mb-3" style="text-align: justify; line-height: 1.7">
                            Pondok Pesantren Darul Amtsilati didirikan dengan visi besar untuk
                            menjadi pusat keunggulan pendidikan Islam yang mengintegrasikan
                            khazanah kitab kuning dengan sains modern. Berawal dari sebuah
                            majelis taklim sederhana, kini kami berkembang menjadi lembaga
                            pendidikan yang dipercaya oleh ribuan wali santri dari berbagai
                            penjuru nusantara.
                        </p>
                        <p class="text-secondary mb-0" style="text-align: justify; line-height: 1.7">
                            Dedikasi kami selama berpuluh tahun fokus pada metode pembelajaran
                            Amtsilati yang inovatif, memudahkan santri dalam menguasai
                            gramatika bahasa Arab sebagai kunci utama memahami literatur Islam
                            klasik secara mendalam dan kontekstual.
                        </p>
                    </div>

                    <div class="col-lg-6 ps-lg-5 mt-5 mt-lg-0">
                        <div class="image-container-profile">
                            <div class="floating-badge text-center">
                                <h4 class="fw-bold mb-0">25+</h4>
                                <small class="opacity-75" style="font-size: 0.75rem">Tahun Mengabdi</small>
                            </div>
                            <img src="{{ asset('assets/images/profil-sejarah.webp') }}"
                                alt="Kegiatan Belajar Darul Amtsilati" class="img-fluid rounded-4 shadow-sm w-100" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- 3. VISI, MISI, DAN TUJUAN -->
        <!-- ========================================================================= -->
        <section class="py-5" style="background-color: #f7f9fc">
            <div class="container py-3">
                <div class="text-center mb-5">
                    <h2 class="fw-bold section-title-underline" style="color: #0d3b1e !important">
                        Visi, Misi, dan Tujuan
                    </h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 bg-white rounded-3">
                            <div class="icon-shape-green mb-4"><i class="bi bi-eye"></i></div>
                            <h4 class="fw-bold mb-3" style="color: #0d3b1e !important">
                                Visi
                            </h4>
                            <p class="text-secondary small mb-0" style="line-height: 1.6">
                                Menjadi lembaga pendidikan Islam terkemuka yang melahirkan
                                ulama-intelektual berjiwa Qur'ani dan berdaya saing global pada
                                tahun 2030.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 bg-white rounded-3">
                            <div class="icon-shape-green mb-4">
                                <i class="bi bi-file-text"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: #0d3b1e !important">
                                Misi
                            </h4>
                            <ul class="text-secondary small ps-3 mb-0" style="line-height: 1.7">
                                <li class="mb-2">
                                    Menyelelenggarakan pendidikan berbasis Kitab Kuning dan
                                    Kurikulum Nasional.
                                </li>
                                <li class="mb-2">
                                    Mengembangkan potensi minat dan bakat santri dalam teknologi
                                    dan dakwah.
                                </li>
                                <li>Menanamkan nilai-nilai Islam Wasathiyah.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm p-4 bg-white rounded-3">
                            <div class="icon-shape-green mb-4">
                                <i class="bi bi-flag"></i>
                            </div>
                            <h4 class="fw-bold mb-3" style="color: #0d3b1e !important">
                                Tujuan
                            </h4>
                            <p class="text-secondary small mb-0" style="line-height: 1.6">
                                Mewujudkan lulusan yang mutafaqqih fiddin, memiliki kemandirian
                                ekonomi, dan mampu berkontribusi positif bagi kemaslahatan
                                masyarakat luas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- 4. KEPEMIMPINAN -->
        <!-- ========================================================================= -->
        <section class="py-5 bg-white">
            <div class="container py-4">
                <div class="card leadership-card bg-white shadow-sm p-4 p-md-5 position-relative overflow-hidden">
                    <div class="quote-mark">99</div>

                    <div class="row align-items-center g-4 position-relative" style="z-index: 2">
                        <div class="col-md-4 text-center text-md-start">
                            <img src="{{ asset('assets/images/pengurus.webp') }}" alt="KH. Ahmad Ridwan, Lc., M.A."
                                class="img-fluid leader-img w-100" style="max-width: 280px" />
                        </div>
                        <div class="col-md-8 ps-md-4">
                            <span class="text-uppercase fw-bold text-success d-block mb-1"
                                style="font-size: 0.8rem; letter-spacing: 1px">Kepemimpinan</span>
                            <h3 class="fw-bold text-dark mb-0">
                                KH. Ahmad Ridwan, Lc., M.A.
                            </h3>
                            <p class="text-uppercase text-muted fw-semibold mb-4"
                                style="font-size: 0.75rem; letter-spacing: 0.5px">
                                Pengasuh Pondok Pesantren
                            </p>

                            <blockquote class="fs-6 text-secondary fst-italic mb-4"
                                style="line-height: 1.7; border-left: none; padding-left: 0">
                                "Pendidikan bukan sekadar mengisi bejana yang kosong, melainkan
                                menyalakan api pengetahuan dan iman di dalam dada setiap santri
                                agar mereka menjadi pelita bagi umat."
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        <!-- Bootstrap 5 Bundle JS via CDN -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Custom JS -->
        <script src="assets/js/script.js"></script>
</body>

</html>
