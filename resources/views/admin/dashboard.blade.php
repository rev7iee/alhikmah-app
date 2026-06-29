<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Al Hikmah</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-green: #116934;
            --dark-green: #0a4d26;
            --bg-sidebar: #052e14;
            --bg-body: #f8fafc;
            --text-slate: #334155;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-slate);
            min-height: 100vh;
        }

        /* ========================================== */
        /* SIDEBAR NAVIGASI DESIGN                    */
        /* ========================================== */
        .sidebar {
            background-color: var(--bg-sidebar);
            min-height: 100vh;
            color: white;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.02);
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.9rem;
            padding: 14px 22px;
            border-radius: 12px;
            margin: 6px 18px;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
        }

        .sidebar .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.04);
        }

        .sidebar .nav-link.active {
            color: #ffffff;
            background-color: var(--primary-green);
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(17, 105, 52, 0.2);
        }


        /* Revamp Tombol Logout Sesuai Ketentuan 4 */
        .btn-logout-premium {
            margin: 0 18px;
            padding: 12px 20px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #fca5a5;
            background-color: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.15);
            transition: all 0.2s ease;
            text-align: left;
            display: flex;
            align-items: center;
        }

        .btn-logout-premium:hover {
            color: #ffffff;
            background-color: #dc2626;
            border-color: #dc2626;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);
        }

        /* ========================================== */
        /* TOP NAVBAR & LAYOUT CARDS                  */
        /* ========================================== */
        .navbar-top {
            background-color: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 16px 32px;
        }

        .main-card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.01);
            padding: 24px;
        }

        /* Card Statistik Minimalis Putih */
        .card-stat-clean {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background-color: #ffffff;
            padding: 28px 24px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .icon-box-round {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            background-color: #e8f5e9;
            color: var(--primary-green);
        }

        /* Card Kontak Hijau Solid Sesuai Desain Gambar */
        .card-contact-solid {
            background-color: var(--dark-green);
            color: #ffffff;
            border-radius: 16px;
            padding: 24px;
            height: 100%;
            box-shadow: 0 6px 20px rgba(10, 77, 38, 0.15);
        }

        /* ========================================== */
        /* DATA TABLE PREMIUM CONFIG                  */
        /* ========================================== */
        .table-premium th {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.75px;
            color: var(--text-muted);
            background-color: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 14px 16px;
        }

        .table-premium td {
            padding: 16px;
            font-size: 0.88rem;
            border-bottom: 1px solid #f1f5f9;
            color: var(--text-slate);
        }

        .table-premium tr:last-child td {
            border-bottom: none;
        }

        .table-img-preview {
            width: 48px;
            height: 34px;
            object-fit: cover;
            border-radius: 6px;
        }

        .badge-category-pill {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 20px;
        }

        /* ========================================== */
        /* TRICK AMAN: ANIMASI KEJUT SAAT REFRESH PAGE */
        /* ========================================== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        main {
            animation: fadeInUp 0.4s ease-out forwards;
        }

        /* ========================================== */
        /* INTERAKSI HOVER INTERAKTIF PADA KARDUS STAT */
        /* ========================================== */
        .card-stat-clean,
        .card-contact-solid,
        .main-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Hover pada Kartu Statistik Putih & Kontak Hijau */
        .card-stat-clean:hover,
        .card-contact-solid:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08) !important;
            border-color: var(--primary-green) !important;
        }

        /* Efek riak ikon di dalam kartu saat kartu di-hover */
        .card-stat-clean:hover .icon-box-round {
            transform: scale(1.1) rotate(5deg);
            background-color: var(--primary-green) !important;
            color: #ffffff !important;
        }

        .icon-box-round {
            transition: all 0.3s ease;
        }

        /* Hover pada baris tabel (Row Table) */
        .table-premium tbody tr {
            transition: background-color 0.2s ease;
        }

        .table-premium tbody tr:hover {
            background-color: #f8fafc;
            cursor: pointer;
        }

        /* Hover pada tombol "Lihat Semua Postingan" */
        .main-card .btn-dark {
            background-color: #1e293b;
            /* Warna hitam slate bawaan desain */
            color: #ffffff;
            border: 1px solid #1e293b;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-card .btn-dark:hover {
            background-color: #ffffff !important;
            /* Latar belakang berubah putih bersih */
            color: #1e293b !important;
            /* Tulisan teks berubah menjadi hitam */
            border-color: #1e293b !important;
            /* Garis tepi luar (outline) menjadi hitam */
            transform: translateY(-2px);
            /* Sedikit terangkat naik agar senada dengan card */
            box-shadow: 0 4px 12px rgba(30, 41, 59, 0.15);
            /* Bayangan tipis saat melayang */
        }

        /* Memastikan warna icon di dalam tombol ikut beradaptasi menjadi hitam saat di-hover */
        .main-card .btn-dark:hover i {
            color: #1e293b !important;
        }

        /* ========================================== */
        /* GLOBAL RESPONSIVE MEDIA QUERIES (3 PAGES)  */
        /* ========================================== */

        /* 1. Pengaturan untuk Layar HP & Tablet (Lebar di bawah 992px) */
        @media (max-width: 991.98px) {

            /* Ubah Sidebar dari kaku di samping menjadi fleksibel di atas/bawah atau susunan tumpuk */
            .sidebar {
                min-height: auto !important;
                padding-bottom: 20px !important;
            }

            .sidebar .nav {
                flex-direction: row !important;
                justify-content: center;
                flex-wrap: wrap;
                margin-top: 15px !important;
            }

            .sidebar .nav-link {
                margin: 4px 6px !important;
                padding: 10px 14px !important;
                font-size: 0.85rem;
            }

            .btn-logout-premium {
                width: calc(100% - 36px) !important;
                margin: 15px auto 0 auto !important;
                justify-content: center !important;
            }

            /* Menghilangkan margin teks top navbar agar rapi di tengah */
            .navbar-top {
                padding: 15px 20px !important;
                text-align: center;
                flex-direction: column;
                gap: 10px;
            }

            /* Sesuaikan padding area kerja utama */
            main {
                padding: 15px !important;
            }
        }

        /* 2. Pengaturan khusus Layar HP Sangat Kecil (Lebar di bawah 576px) */
        @media (max-width: 575.98px) {
            .sidebar .nav {
                justify-content: start;
            }

            .sidebar .nav-item {
                width: 100%;
                /* Menu sidebar menjadi berbaris turun ke bawah di HP kecil */
            }

            .sidebar .nav-link {
                margin: 2px 15px !important;
            }

            /* Menyelaraskan teks judul halaman */
            main h3 {
                font-size: 1.4rem;
            }

            /* Membuat horizontal tab pada halaman setting bisa di-scroll ke samping jika kepanjangan */
            .nav-tabs-custom {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                padding-bottom: 5px;
            }

            .nav-tabs-custom .nav-item {
                flex: 0 0 auto;
            }

            /* Melonggarkan container tombol aksi form di paling bawah agar tidak numpuk */
            .d-flex.justify-content-end.gap-3 {
                flex-direction: column-reverse;
                width: 100%;
            }

            .d-flex.justify-content-end.gap-3 .btn,
            .d-flex.justify-content-end.gap-3 a {
                width: 100% !important;
                text-align: center;
            }

            /* Optimasi tombol aksi di tabel agar tidak terlalu berdempetan */
            .table-premium td .d-flex {
                flex-wrap: wrap;
                gap: 6px !important;
            }
        }

        /* ========================================== */
        /* CSS TOGGLE SIDEBAR MOBILE CUSTOM           */
        /* ========================================== */

        /* Tombol Hamburger (Hanya muncul di Mobile/Tablet) */
        .sidebar-toggle {
            display: none;
            background-color: var(--bg-sidebar);
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 1.25rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(5, 46, 20, 0.15);
        }

        .sidebar-toggle:hover {
            background-color: var(--primary-green);
            color: #ffffff;
        }

        /* Batasan Layar di bawah 992px (Mobile & Tablet) */
        @media (max-width: 991.98px) {
            .sidebar-toggle {
                display: inline-block;
                /* Munculkan tombol di mobile */
            }

            /* Sembunyikan sidebar secara default di mobile */
            .sidebar {
                display: none !important;
                min-height: auto !important;
                position: fixed;
                top: 0;
                left: 0;
                width: 280px !important;
                height: 100vh !important;
                z-index: 1050;
                padding-bottom: 30px !important;
                overflow-y: auto;
            }

            /* Class sakti untuk memunculkan kembali sidebar via JavaScript */
            .sidebar.show-sidebar {
                display: flex !important;
                flex-direction: column;
            }

            /* Reset navigasi sidebar mobile agar kembali vertikal (menumpuk kebawah) */
            .sidebar .nav {
                flex-direction: column !important;
                justify-content: start !important;
                margin-top: 20px !important;
            }

            .sidebar .nav-link {
                margin: 6px 18px !important;
                padding: 12px 20px !important;
            }

            .btn-logout-premium {
                width: calc(100% - 36px) !important;
                margin: 20px 18px 0 18px !important;
                justify-content: flex-start !important;
            }

            /* Overlay transparan di belakang sidebar saat sidebar terbuka */
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background-color: rgba(0, 0, 0, 0.4);
                z-index: 1040;
                backdrop-filter: blur(2px);
            }

            .sidebar-overlay.show-overlay {
                display: block;
            }
        }

        /* ======================================================== */
        /* PERBAIKAN SIDEBAR FIXED & INDEPENDENT CONTENT SCROLL     */
        /* ======================================================== */

        @media (min-width: 992px) {

            /* 1. Paksa Container Utama Mengunci Tinggi Layar Monitor */
            .container-fluid.px-0 {
                height: 100vh !important;
                overflow: hidden !important;
            }

            .container-fluid.px-0>.row.g-0 {
                height: 100vh !important;
            }

            /* 2. Buat Sidebar Menjadi Fixed/Statis Melalui Flexbox Tinggi Penuh */
            .sidebar {
                position: sticky !important;
                top: 0;
                height: 100vh !important;
                overflow-y: auto;
                /* Jika menu sidebar sangat banyak, ia bisa di-scroll sendiri */
                z-index: 1030;
            }

            /* 3. Buat Area Konten Kanan Menjadi Independent Scrollable Box */
            .col-md-9.col-lg-10.px-0.d-flex.flex-column {
                height: 100vh !important;
                overflow-y: auto !important;
                /* Hanya area kanan ini yang akan berputar saat di-scroll */
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid px-0">
        <div class="row g-0">

            <div class="col-md-3 col-lg-2 px-0 sidebar d-flex flex-column justify-content-between pb-4">
                <div>
                    <div class="p-4 text-center border-bottom border-white border-opacity-10 mb-3">
                        <h5 class="fw-bold mb-0 text-white tracking-wide">Al–Hikmah</h5>
                        <span class="text-white-50 opacity-70"
                            style="font-size: 0.65rem; letter-spacing: 0.5px; text-transform: uppercase;">Pondok
                            Pesantren</span>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-columns-gap me-3"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.posts.index') }}">
                                <i class="bi bi-collection me-3"></i> Postingan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.settings') }}">
                                <i class="bi bi-sliders2 me-3"></i> Setting Website
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-logout-premium">
                            <i class="bi bi-box-arrow-left me-3"></i> Keluar Sistem
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-9 col-lg-10 px-0 d-flex flex-column">

                <nav class="navbar navbar-top navbar-light justify-content-between">
                    <div>
                        <span class="text-success fw-medium small d-block mb-0" style="font-size: 0.8rem;">Dashboard
                            Overview</span>
                        <small class="text-muted small">Selamat datang kembali di pusat administrasi Al-Hikmah.</small>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <button type="button" class="sidebar-toggle" id="toggleSidebarBtn">
                            <i class="bi bi-list"></i>
                        </button>
                        <div class="text-end d-none d-sm-block">
                            <span class="small fw-semibold text-dark d-block lh-1">Admin Utama</span>
                            <small class="text-muted"
                                style="font-size: 0.65rem; text-transform: uppercase; letter-spacing: 0.3px;">Super
                                Administrator</small>
                        </div>
                        <i class="bi bi-person-circle fs-3 text-secondary opacity-70"></i>
                    </div>
                </nav>

                <main class="p-4 flex-grow-1">
                    <!-- ========================================== -->
                    <!-- BARIS KARTU STATISTIK (FIXED & IMPROVED)   -->
                    <!-- ========================================== -->
                    <div class="row g-4 mb-4">
                        <!-- Card 1: Total Berita (Dinamis Bulan Ini) -->
                        <div class="col-md-4">
                            <div class="card-stat-clean">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <div>
                                        <small class="text-muted text-uppercase fw-semibold tracking-wider d-block mb-1"
                                            style="font-size: 0.7rem;">Total Berita</small>
                                        <h2 class="fw-bold text-dark mb-1">{{ $totalPosts }}</h2>
                                    </div>
                                    <div class="icon-box-round">
                                        <i class="bi bi-file-text-fill"></i>
                                    </div>
                                </div>
                                <!-- SUB-TEXT DINAMIS: Menampilkan jumlah berita khusus bulan berjalan -->
                                <small class="text-success fw-medium" style="font-size: 0.75rem;">
                                    <i class="bi bi-graph-up-arrow me-1"></i> +{{ $postsThisMonth }} berita baru bulan
                                    ini
                                </small>
                            </div>
                        </div>

                        <!-- Card 2: Status Pop Up Berita -->
                        <div class="col-md-4">
                            <div class="card-stat-clean">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <small class="text-muted text-uppercase fw-semibold tracking-wider d-block mb-1"
                                            style="font-size: 0.7rem;">Pop Up Berita</small>
                                        <h4 class="fw-bold text-dark mb-0 mt-1">{{ $isBannerActive }}</h4>
                                    </div>
                                    <div class="icon-box-round bg-warning bg-opacity-10 text-warning">
                                        <i class="bi bi-bell-fill"></i>
                                    </div>
                                </div>
                                <div class="p-2 bg-light rounded-3 d-flex justify-content-between align-items-center">
                                    <span class="small text-secondary" style="font-size: 0.75rem;">Status Toggle</span>
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            style="cursor: default;" {{ $isBannerActive == 'Aktif' ? 'checked' : '' }}
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Identitas Kontak Solid (Fixed Space Gap) -->
                        <div class="col-md-4">
                            <div class="card-contact-solid d-flex flex-column justify-content-between">
                                <h6 class="small text-uppercase fw-bold tracking-wider mb-3"
                                    style="font-size: 0.7rem; opacity: 0.85;">Identitas Kontak</h6>

                                <!-- Alamat (Menggunakan gap-3 asli Bootstrap untuk melonggarkan jarak ikon) -->
                                <div class="mb-3 d-flex align-items-start gap-3">
                                    <div class="mt-0.5">
                                        <i class="bi bi-geo-alt-fill opacity-75" style="font-size: 1rem;"></i>
                                    </div>
                                    <span class="small opacity-90"
                                        style="font-size: 0.78rem; line-height: 1.5;">{{ $settings['pondok_address'] ?? 'Belum Diatur' }}</span>
                                </div>

                                <!-- Telepon -->
                                <div class="mb-3 d-flex align-items-center gap-3">
                                    <div>
                                        <i class="bi bi-telephone-fill opacity-75" style="font-size: 1rem;"></i>
                                    </div>
                                    <span class="small opacity-90"
                                        style="font-size: 0.78rem;">{{ $settings['pondok_phone'] ?? 'Belum Diatur' }}</span>
                                </div>

                                <!-- Email -->
                                <div class="mb-0 d-flex align-items-center gap-3">
                                    <div>
                                        <i class="bi bi-envelope-fill opacity-75" style="font-size: 1rem;"></i>
                                    </div>
                                    <span class="small opacity-90 text-truncate"
                                        style="font-size: 0.78rem; max-width: 200px;">{{ $settings['pondok_email'] ?? 'Belum Diatur' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-0" style="font-size: 1rem;">Riwayat Upload Berita</h5>
                                <small class="text-muted small">Aktivitas publikasi konten terbaru</small>
                            </div>
                            <a href="{{ route('admin.posts.index') }}"
                                class="btn btn-sm btn-dark px-3 py-2 rounded-3 fw-medium" style="font-size: 0.8rem;">
                                <i class="bi bi-eye me-1"></i> Lihat Semua Postingan
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-premium align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">Tanggal</th>
                                        <th style="width: 12%">Thumb</th>
                                        <th style="width: 53%">Judul Berita</th>
                                        <th style="width: 20%">Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentPosts as $post)
                                        <tr>
                                            <td class="text-muted small">
                                                {{ $post->created_at->translatedFormat('d M Y') }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('assets/images/news/' . $post->thumbnail) }}"
                                                    class="table-img-preview" alt="thumb"
                                                    onerror="this.src='https://via.placeholder.com/48x34?text=Post'">
                                            </td>
                                            <td>
                                                <span class="fw-semibold text-dark text-truncate d-block"
                                                    style="max-width: 420px;">{{ $post->title }}</span>
                                            </td>
                                            <td>
                                                @if ($post->category == 'News')
                                                    <span
                                                        class="badge-category-pill bg-primary bg-opacity-10 text-primary">News</span>
                                                @elseif($post->category == 'Education')
                                                    <span
                                                        class="badge-category-pill bg-success bg-opacity-10 text-success">Education</span>
                                                @elseif($post->category == 'Events')
                                                    <span
                                                        class="badge-category-pill bg-warning bg-opacity-10 text-warning">Events</span>
                                                @else
                                                    <span
                                                        class="badge-category-pill bg-info bg-opacity-10 text-info">Informatic</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted small">
                                                <i class="bi bi-layers opacity-40 fs-3 d-block mb-2"></i>
                                                Belum ada riwayat publikasi berita terdata.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>

        </div>
    </div>
    <!-- ========================================== -->
    <!-- SCRIPT JAVASCRIPT TOGGLE SIDEBAR MOBILE    -->
    <!-- ========================================== -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleSidebarBtn');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            // Fungsi Buka / Tutup saat tombol Hamburger diklik
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('show-sidebar');
                overlay.classList.toggle('show-overlay');
            });

            // Fungsi Otomatis Tutup Sidebar jika area luar (overlay) diklik
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show-sidebar');
                overlay.classList.remove('show-overlay');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Overlay Transparan Pendukung Sidebar Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
</body>

</html>
