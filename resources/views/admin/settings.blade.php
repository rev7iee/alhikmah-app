<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Website - Al Hikmah</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
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

        /* --- ANIMASI FADE IN PAGE LOAD --- */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        main {
            animation: fadeInUp 0.4s ease-out forwards;
        }

        /* --- SIDEBAR NAVIGASI DESIGN SYSTEM --- */
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

        /* Tombol Logout Presisi */
        .btn-logout-premium {
            width: calc(100% - 36px) !important;
            margin: 0 18px;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #fca5a5;
            background-color: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.15);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .btn-logout-premium:hover {
            color: #ffffff;
            background-color: #dc2626;
            border-color: #dc2626;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);
        }

        /* --- HEADER TOP NAVBAR --- */
        .navbar-top {
            background-color: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            padding: 16px 32px;
        }

        /* --- STYLING TAB STRIP HORIZONTAL --- */
        .nav-tabs-custom {
            border-bottom: 1px solid #e2e8f0;
            gap: 8px;
        }

        .nav-tabs-custom .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.92rem;
            border: none;
            padding: 12px 24px;
            border-radius: 10px 10px 0 0;
            background: none;
            position: relative;
            transition: all 0.2s ease;
        }

        .nav-tabs-custom .nav-link:hover {
            color: var(--primary-green);
            background-color: #f1f5f9;
        }

        .nav-tabs-custom .nav-link.active {
            color: var(--primary-green) !important;
            font-weight: 600;
            background: none;
        }

        .nav-tabs-custom .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-green);
            border-radius: 3px 3px 0 0;
        }

        /* --- LAYOUT KONTEN KANAN-KIRI (COL SPLIT) --- */
        .form-section-card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.01);
        }

        .section-desc-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
        }

        /* --- COMPONENT INPUT DESIGN SCREEN 4 --- */
        .input-box-premium {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 11px 16px;
            font-size: 0.92rem;
            color: var(--text-slate);
            background-color: #ffffff;
            transition: all 0.2s ease;
        }

        .input-box-premium:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 4px rgba(17, 105, 52, 0.06);
            outline: none;
        }

        /* Upload Container Card */
        .upload-drag-area {
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            background-color: #f8fafc;
            padding: 32px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .upload-drag-area:hover {
            border-color: var(--primary-green);
            background-color: #f0fdf4;
        }

        /* Program Icon Wrapper Mini */
        .icon-badge-wrap {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background-color: #e8f5e9;
            color: var(--primary-green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* --- HOVER NEGATIF ACTION BUTTONS --- */
        .btn-action-save {
            background-color: var(--dark-green);
            color: #ffffff;
            border: 1px solid var(--dark-green);
            font-weight: 500;
            font-size: 0.92rem;
            padding: 12px 28px;
            border-radius: 10px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-action-save:hover {
            background-color: #ffffff !important;
            color: var(--dark-green) !important;
            border-color: var(--dark-green) !important;
            box-shadow: 0 4px 12px rgba(10, 77, 38, 0.15);
            transform: translateY(-1px);
        }

        .btn-action-cancel {
            background-color: #ffffff;
            color: var(--text-muted);
            border: 1px solid #e2e8f0;
            font-weight: 500;
            font-size: 0.92rem;
            padding: 12px 28px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-action-cancel:hover {
            background-color: #f8fafc;
            color: var(--text-slate);
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
    </style>
</head>

<body style="overflow-x: hidden; width: 100%;">

    <div class="container-fluid px-0" style="overflow-x: hidden; width: 100%;">
        <div class="row g-0">

            <!-- ========================================== -->
            <!-- SIDEBAR NAVIGASI KIRI                      -->
            <!-- ========================================== -->
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
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-columns-gap me-3"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.posts.index') }}">
                                <i class="bi bi-collection me-3"></i> Postingan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.settings') }}">
                                <i class="bi bi-sliders2 me-3"></i> Setting Website
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-logout-premium w-100 border-0">
                            <i class="bi bi-box-arrow-left me-3"></i> Keluar Sistem
                        </button>
                    </form>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- KONTEN UTAMA KANAN                         -->
            <!-- ========================================== -->
            <div class="col-md-9 col-lg-10 px-0 d-flex flex-column">

                <!-- Navbar Top System Header Alignment -->
                <nav class="navbar navbar-top navbar-light justify-content-between">
                    <div>
                        <span class="text-success fw-medium small d-block mb-0" style="font-size: 0.8rem;">Setting
                            Website</span>
                        <small class="text-muted small">Modifikasi teks, gambar banner, program, dan kontak utama profil
                            Al Hikmah.</small>
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

                <!-- Main Area Content -->
                <main class="p-4 flex-grow-1">

                    @if (session('success'))
                        <div
                            class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill fs-5"></i> <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
                            <div class="d-flex align-items-center gap-2 mb-2 fw-bold text-danger">
                                <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                                <span>Gagal Menyimpan Pengaturan:</span>
                            </div>
                            <ul class="mb-0 small ps-4 text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- MAIN FORM CONFIGURATION (BACKEND UNTOUCHED) -->
                    <form action="{{ route('admin.settings.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-section-card p-4">
                            <!-- STRIP NAVIGASI TAB LAYOUT (Ketentuan 2 Horizontal) -->
                            <ul class="nav nav-tabs nav-tabs-custom mb-5" id="settingTabs" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" id="general-tab" data-bs-toggle="tab"
                                        data-bs-target="#general" type="button" role="tab"><i
                                            class="bi bi-window-sidebar me-2"></i>Umum & Banner</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="programs-tab" data-bs-toggle="tab"
                                        data-bs-target="#programs" type="button" role="tab"><i
                                            class="bi bi-award me-2"></i>Program Unggulan</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact" type="button" role="tab"><i
                                            class="bi bi-telephone-inbound me-2"></i>Informasi Kontak</button>
                                </li>
                            </ul>

                            <!-- KELOMPOK TAB VIEW KANAN KIRI -->
                            <div class="tab-content" id="settingTabsContent">

                                <!-- ========================================================================= -->
                                <!-- TAB 1: UMUM & BANNER DESIGN MATCH SCREEN 4                                -->
                                <!-- ========================================================================= -->
                                <div class="tab-pane fade show active" id="general" role="tabpanel">
                                    <div class="row g-4">
                                        <!-- Kolom Deskripsi Kiri -->
                                        <div class="col-lg-4">
                                            <h5 class="section-desc-title mb-1">Umum & Banner</h5>
                                            <p class="text-muted small" style="line-height: 1.5;">Konfigurasi
                                                identitas
                                                dasar sekolah dan tampilan utama website.</p>
                                        </div>
                                        <!-- Kolom Input Kanan -->
                                        <div class="col-lg-8">
                                            <div class="mb-4">
                                                <label class="form-label small fw-semibold text-dark mb-2">Pesan Teks
                                                    Pengumuman Atas (Top Announcement Bar)</label>
                                                <input type="text" name="top_announcement"
                                                    class="form-control input-box-premium"
                                                    placeholder="Mencetak Generasi Qur'ani, Cerdas, dan Berakhlak Mulia"
                                                    value="{{ $settings['top_announcement'] ?? '' }}">
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label small fw-semibold text-dark mb-2">Link
                                                    Eksternal Video Profil</label>
                                                <input type="url" name="video_profil_url"
                                                    class="form-control input-box-premium"
                                                    placeholder="https://www.youtube.com/watch?v=..."
                                                    value="{{ $settings['video_profil_url'] ?? '' }}">
                                            </div>

                                            <div class="mb-0">
                                                <label class="form-label small fw-semibold text-dark mb-2">File Pop-up
                                                    Banner Pengumuman Beranda</label>
                                                <div class="upload-drag-area" id="drop-zone"
                                                    style="cursor: pointer; position: relative;">
                                                    <i class="bi bi-cloud-arrow-up text-muted fs-2 d-block mb-2"></i>
                                                    <span class="small d-block text-dark fw-medium mb-1">Klik untuk
                                                        ganti gambar atau seret file ke sini</span>
                                                    <span class="text-muted d-block text-max-size"
                                                        style="font-size: 0.72rem;">Rekomendasi: 1920 x 1080px (Maks.
                                                        20MB)</span>

                                                    <input type="file" name="popup_banner_image" id="file-input"
                                                        class="d-none" accept="image/jpeg,image/png,image/jpg">

                                                    <div id="preview-container" class="mt-3 d-none">
                                                        <img id="image-preview" src="#" alt="Pratinjau Gambar"
                                                            class="img-fluid rounded-3 shadow-sm"
                                                            style="max-height: 200px;">
                                                        <p class="small text-success mt-2 mb-0 fw-medium"
                                                            id="file-name-preview"></p>
                                                    </div>
                                                </div>

                                                @if (!empty($settings['popup_banner_image']))
                                                    <div
                                                        class="mt-3 p-3 border rounded-3 bg-light bg-opacity-50 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3">
                                                        <div class="d-flex align-items-center gap-2 min-w-0">
                                                            <i class="bi bi-image text-success fs-5 flex-shrink-0"></i>
                                                            <span
                                                                class="small fw-medium text-dark text-truncate d-block">
                                                                {{ $settings['popup_banner_image'] }}
                                                            </span>
                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-danger px-3 rounded-3 fw-medium w-10 w-sm-auto flex-shrink-0"
                                                            style="font-size: 0.78rem;"
                                                            onclick="if(confirm('Apakah Anda yakin ingin menghapus dan menonaktifkan banner pengumuman ini?')) { document.getElementById('form-hapus-banner-independen').submit(); }">
                                                            <i class="bi bi-trash3 me-1"></i> Hapus Banner
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ========================================================================= -->
                                <!-- TAB 2: PROGRAM UNGGULAN DESIGN MATCH SCREEN 4                           -->
                                <!-- ========================================================================= -->
                                <div class="tab-pane fade" id="programs" role="tabpanel">
                                    <div class="row g-4">
                                        <!-- Kolom Keterangan Kiri -->
                                        <div class="col-lg-4">
                                            <h5 class="section-desc-title mb-1">Program Unggulan</h5>
                                            <p class="text-muted small" style="line-height: 1.5;">Tampilkan 3 program
                                                utama yang menjadi ciri khas sekolah di halaman depan.</p>
                                        </div>
                                        <!-- Kolom Input Kanan List Program -->
                                        <div class="col-lg-8">

                                            <!-- LOOP PROGRAM CONTAINER 1 -->
                                            <div
                                                class="p-4 border border-light-subtle rounded-4 mb-4 bg-white shadow-sm">
                                                <div class="d-flex align-items-center gap-3 mb-3">
                                                    <div class="icon-badge-wrap"><i class="bi bi-book"></i></div>
                                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">
                                                        Program Unggulan Utama (Poin 1)</h6>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label small text-muted mb-1">Judul
                                                            Program</label>
                                                        <input type="text" name="program_1_title"
                                                            class="form-control input-box-premium"
                                                            placeholder="Contoh: Tahfidz Al-Qur'an"
                                                            value="{{ $settings['program_1_title'] ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label small text-muted mb-1">Deskripsi
                                                        Singkat</label>
                                                    <textarea name="program_1_desc" class="form-control input-box-premium" rows="3"
                                                        placeholder="Tuliskan ringkasan program..." style="resize: none;">{{ $settings['program_1_desc'] ?? '' }}</textarea>
                                                </div>
                                                <div>
                                                    <label class="form-label small text-muted mb-1">Ganti File
                                                        Ilustrasi Gambar</label>
                                                    <input type="file" name="program_1_image" id="program_1_input"
                                                        class="form-control input-box-premium" accept="image/*">
                                                    @if (!empty($settings['program_1_image']))
                                                        <small class="text-success d-block mt-1 fw-medium"
                                                            style="font-size: 0.75rem;"><i
                                                                class="bi bi-paperclip"></i> File aktif:
                                                            {{ $settings['program_1_image'] }}</small>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- LOOP PROGRAM CONTAINER 2 -->
                                            <div
                                                class="p-4 border border-light-subtle rounded-4 mb-4 bg-white shadow-sm">
                                                <div class="d-flex align-items-center gap-3 mb-3">
                                                    <div class="icon-badge-wrap bg-warning bg-opacity-10 text-warning">
                                                        <i class="bi bi-translate"></i>
                                                    </div>
                                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">
                                                        Program Unggulan Poin 2</h6>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label small text-muted mb-1">Judul
                                                            Program</label>
                                                        <input type="text" name="program_2_title"
                                                            class="form-control input-box-premium"
                                                            value="{{ $settings['program_2_title'] ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label small text-muted mb-1">Deskripsi
                                                        Singkat</label>
                                                    <textarea name="program_2_desc" class="form-control input-box-premium" rows="3" style="resize: none;">{{ $settings['program_2_desc'] ?? '' }}</textarea>
                                                </div>
                                            </div>

                                            <!-- LOOP PROGRAM CONTAINER 3 -->
                                            <div
                                                class="p-4 border border-light-subtle rounded-4 mb-4 bg-white shadow-sm">
                                                <div class="d-flex align-items-center gap-3 mb-3">
                                                    <div class="icon-badge-wrap bg-primary bg-opacity-10 text-primary">
                                                        <i class="bi bi-stars"></i>
                                                    </div>
                                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">
                                                        Program Unggulan Poin 3</h6>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label small text-muted mb-1">Judul
                                                            Program</label>
                                                        <input type="text" name="program_3_title"
                                                            class="form-control input-box-premium"
                                                            value="{{ $settings['program_3_title'] ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label small text-muted mb-1">Deskripsi
                                                        Singkat</label>
                                                    <textarea name="program_3_desc" class="form-control input-box-premium" rows="3" style="resize: none;">{{ $settings['program_3_desc'] ?? '' }}</textarea>
                                                </div>
                                            </div>

                                            <!-- LOOP PROGRAM CONTAINER 4 -->
                                            <div
                                                class="p-4 border border-light-subtle rounded-4 mb-0 bg-white shadow-sm">
                                                <div class="d-flex align-items-center gap-3 mb-3">
                                                    <div class="icon-badge-wrap bg-info bg-opacity-10 text-info"><i
                                                            class="bi bi-mortarboard-fill"></i></div>
                                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">
                                                        Program Profil Poin 4</h6>
                                                </div>
                                                <div class="row g-3 mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label small text-muted mb-1">Judul
                                                            Program</label>
                                                        <input type="text" name="program_4_title"
                                                            class="form-control input-box-premium"
                                                            value="{{ $settings['program_4_title'] ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <label class="form-label small text-muted mb-1">Deskripsi
                                                        Singkat</label>
                                                    <textarea name="program_4_desc" class="form-control input-box-premium" rows="3" style="resize: none;">{{ $settings['program_4_desc'] ?? '' }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- ========================================================================= -->
                                <!-- TAB 3: INFORMASI KONTAK DESIGN MATCH SCREEN 4                            -->
                                <!-- ========================================================================= -->
                                <div class="tab-pane fade" id="contact" role="tabpanel">
                                    <div class="row g-4">
                                        <!-- Kolom Keterangan Kiri -->
                                        <div class="col-lg-4">
                                            <h5 class="section-desc-title mb-1">Informasi Kontak</h5>
                                            <p class="text-muted small" style="line-height: 1.5;">Detail alamat dan
                                                media sosial yang akan muncul di bagian footer website.</p>
                                        </div>
                                        <!-- Kolom Input Form Kanan -->
                                        <div class="col-lg-8">
                                            <div class="row g-3 mb-4">
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-semibold text-dark mb-1">Nomor
                                                        Telepon / WhatsApp</label>
                                                    <input type="text" name="pondok_phone"
                                                        class="form-control input-box-premium"
                                                        placeholder="Contoh: (021) 1234567"
                                                        value="{{ $settings['pondok_phone'] ?? '' }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-semibold text-dark mb-1">Email
                                                        Resmi Instansi</label>
                                                    <input type="email" name="pondok_email"
                                                        class="form-control input-box-premium"
                                                        placeholder="info@alhikmah.sch.id"
                                                        value="{{ $settings['pondok_email'] ?? '' }}">
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label class="form-label small fw-semibold text-dark mb-1">Alamat
                                                    Lengkap Instansi</label>
                                                <textarea name="pondok_address" class="form-control input-box-premium" rows="3"
                                                    placeholder="Masukkan nama jalan, RT/RW, kecamatan, kabupaten..." style="resize: none;">{{ $settings['pondok_address'] ?? '' }}</textarea>
                                                <div class="form-text text-muted" style="font-size: 0.75rem;">Sekali
                                                    diinput, otomatis merubah footer beranda umum.</div>
                                            </div>

                                            <div class="mb-0">
                                                <label class="form-label small fw-semibold text-dark mb-1">Foto Lanskap
                                                    Pondok</label>
                                                <input type="file" name="pondok_campus_image" id="campus_input"
                                                    class="form-control input-box-premium" accept="image/*">
                                                @if (!empty($settings['pondok_campus_image']))
                                                    <small class="text-primary d-block mt-1 fw-medium"
                                                        style="font-size: 0.75rem;"><i class="bi bi-file-image"></i>
                                                        Gambar aktif: {{ $settings['pondok_campus_image'] }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- SEPARATOR GARIS BAWAH -->
                            <hr class="my-5 opacity-25" style="color: var(--text-muted);">

                            <!-- FORM ACTION ACTION FOOTER BUTTONS (Ketentuan 3 Hover Negatif) -->
                            <div class="d-flex justify-content-end gap-3 px-2">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-action-cancel">Batalkan</a>
                                <button type="submit" class="btn btn-action-save shadow-sm">
                                    <i class="bi bi-check-circle-fill me-2"></i>Simpan Perubahan
                                </button>
                            </div>

                        </div>
                    </form>

                    <!-- HIDDEN FORM INDEPENDEN HAPUS BANNER BANNER -->
                    <form id="form-hapus-banner-independen" action="{{ route('admin.settings.delete-banner') }}"
                        method="POST" style="display: none;">
                        @csrf
                    </form>

                </main>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropZone = document.getElementById('drop-zone');
            const fileInput = document.getElementById('file-input');
            const previewContainer = document.getElementById('preview-container');
            const imagePreview = document.getElementById('image-preview');
            const fileNamePreview = document.getElementById('file-name-preview');

            // --- VALIDASI INSTAN UKURAN GAMBAR SETTING (MAKSIMAL 10 MB) ---
            const maxSizeBytes = 10 * 1024 * 1024; // 10 MB dalam satuan Bytes

            // Daftar semua input file di halaman Setting Website
            const settingInputs = [{
                    element: fileInput,
                    name: 'Banner Pengumuman Beranda'
                },
                {
                    element: document.getElementById('program_1_input'),
                    name: 'Foto Program Unggulan 1'
                },
                {
                    element: document.getElementById('campus_input'),
                    name: 'Foto Lanskap Pondok'
                }
            ];

            settingInputs.forEach(item => {
                if (item.element) {
                    item.element.addEventListener('change', function() {
                        if (this.files.length > 0) {
                            const fileSize = this.files[0].size;

                            if (fileSize > maxSizeBytes) {
                                // Peringatan instan tanpa membebani loading server Hostinger
                                alert(
                                    `Gagal: Ukuran file ${item.name} terlalu besar!\nMaksimal ukuran yang diperbolehkan adalah 10 MB.\n\nFile yang Anda pilih berukuran ${(fileSize / 1024 / 1024).toFixed(2)} MB.`
                                );

                                // Kosongkan kembali input file yang melanggar agar tidak ter-submit
                                this.value = '';

                                // Jika yang melanggar adalah area drag-drop banner, sembunyikan container preview
                                if (item.element === fileInput) {
                                    previewContainer.classList.add('d-none');
                                }
                            }
                        }
                    });
                }
            });

            // 1. Jika area drop-zone di-klik, pemicu klik input file bawaan
            dropZone.addEventListener('click', (e) => {
                if (e.target !== fileInput) {
                    fileInput.click();
                }
            });

            // 2. Efek visual saat file diseret di atas area (Drag Over)
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.style.borderColor = 'var(--primary-green)';
                    dropZone.style.backgroundColor = '#f0fdf4';
                }, false);
            });

            // 3. Kembalikan visual jika file batal di-drop (Drag Leave)
            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    if (eventName === 'dragleave') {
                        dropZone.style.borderColor = '#cbd5e1';
                        dropZone.style.backgroundColor = '#f8fafc';
                    }
                }, false);
            });

            // 4. Menangani file yang dilepas (Drop File)
            dropZone.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                const files = dt.files;

                if (files.length > 0) {
                    const fileSize = files[0].size;

                    // Validasi ukuran khusus untuk fitur DROP file di Banner
                    if (fileSize > maxSizeBytes) {
                        alert(
                            `Gagal: Ukuran file Banner Pengumuman Beranda terlalu besar!\nMaksimal ukuran yang diperbolehkan adalah 10 MB.\n\nFile yang Anda lepas berukuran ${(fileSize / 1024 / 1024).toFixed(2)} MB.`
                        );
                        fileInput.value = '';
                        previewContainer.classList.add('d-none');
                        return;
                    }

                    fileInput.files = files;
                    handlePreview(files[0]);
                }
            });

            // 5. Menangani file yang dipilih lewat dialog klik biasa (Change Event)
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0 && this.files[0].size <= maxSizeBytes) {
                    handlePreview(this.files[0]);
                }
            });

            // Fungsi membaca file dan memunculkan Pratinjau (Preview) Gambar
            function handlePreview(file) {
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak didukung! Sila unggah file berformat JPG, JPEG, atau PNG.');
                    fileInput.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onloadend = function() {
                    imagePreview.src = reader.result;
                    fileNamePreview.innerHTML =
                        `<i class="bi bi-file-earmark-check"></i> Siap diunggah: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
                    previewContainer.classList.remove('d-none');
                }
            }
        });
    </script>
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
    <!-- Overlay Transparan Pendukung Sidebar Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
</body>

</html>
