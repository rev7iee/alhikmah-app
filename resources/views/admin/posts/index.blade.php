<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Berita - Al Hikmah</title>

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

        .filter-card {
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background-color: #ffffff;
            padding: 16px 20px;
        }

        .card-mini-stat {
            background-color: var(--dark-green);
            color: #ffffff;
            border-radius: 14px;
            padding: 16px 20px;
            box-shadow: 0 4px 12px rgba(10, 77, 38, 0.1);
        }

        .btn-add-news {
            background-color: var(--dark-green);
            color: #ffffff;
            border: 1px solid var(--dark-green);
            font-weight: 500;
            font-size: 0.9rem;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.25s ease;
        }

        .btn-add-news:hover {
            background-color: #ffffff !important;
            color: var(--dark-green) !important;
            border-color: var(--dark-green) !important;
            box-shadow: 0 4px 12px rgba(10, 77, 38, 0.15);
        }

        .btn-action-edit {
            color: var(--primary-green);
            background-color: rgba(17, 105, 52, 0.06);
            border: 1px solid transparent;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .btn-action-edit:hover {
            color: #ffffff;
            background-color: var(--primary-green);
            box-shadow: 0 3px 8px rgba(17, 105, 52, 0.2);
        }

        .btn-action-delete {
            color: #dc2626;
            background-color: rgba(220, 38, 38, 0.06);
            border: 1px solid transparent;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .btn-action-delete:hover {
            color: #ffffff;
            background-color: #dc2626;
            box-shadow: 0 3px 8px rgba(220, 38, 38, 0.2);
        }

        .btn-submit-modal {
            background-color: var(--dark-green);
            color: #ffffff;
            border: 1px solid var(--dark-green);
            transition: all 0.2s ease;
        }

        .btn-submit-modal:hover {
            background-color: #ffffff !important;
            color: var(--dark-green) !important;
            border-color: var(--dark-green) !important;
        }

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

        .table-img {
            width: 54px;
            height: 38px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.04);
        }

        .badge-pill-custom {
            font-size: 0.72rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .bg-pill-news {
            background-color: #e0f2fe;
            color: #0369a1;
        }

        .bg-pill-edu {
            background-color: #dcfce7;
            color: #15803d;
        }

        .bg-pill-event {
            background-color: #fef9c3;
            color: #a16207;
        }

        .bg-pill-info {
            background-color: #fae8ff;
            color: #a21caf;
        }

        .modal-input-custom {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.92rem;
        }

        .modal-input-custom:focus {
            background-color: #ffffff;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 4px rgba(17, 105, 52, 0.08);
        }

        /* Modifikasi style bawaan laravel pagination agar serasi */
        .pagination-premium .pagination {
            margin-bottom: 0;
            gap: 4px;
        }

        .pagination-premium .page-link {
            color: var(--text-slate);
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding: 6px 12px;
            font-size: 0.85rem;
        }

        .pagination-premium .page-item.active .page-link {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            color: #ffffff;
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

<body style="overflow-x: hidden; width: 100%;">

    <div class="container-fluid px-0" style="overflow-x: hidden; width: 100%;">
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
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-columns-gap me-3"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.posts.index') }}">
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
                        <span class="text-success fw-medium small d-block mb-0" style="font-size: 0.8rem;">Posting
                            Control</span>
                        <small class="text-muted small">Kelola semua konten berita dan pengumuman sekolah di
                            sini.</small>
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

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fw-bold text-dark mb-1">Manajemen Berita</h3>
                        </div>
                        <button type="button" class="btn btn-add-news shadow-sm d-flex align-items-center gap-2"
                            data-bs-toggle="modal" data-bs-target="#modalTambahBerita">
                            <i class="bi bi-plus-lg"></i> <span>Tambah Berita</span>
                        </button>
                    </div>

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
                                <span>Gagal Menerbitkan Berita:</span>
                            </div>
                            <ul class="mb-0 small ps-4 text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row g-4 mb-4 align-items-stretch">
                        <div class="col-md-8">
                            <div class="filter-card h-100 d-flex align-items-center gap-3">
                                <span class="text-muted small fw-bold text-uppercase tracking-wider mb-0"
                                    style="font-size: 0.72rem;">Filter:</span>
                                <div style="min-width: 200px;">
                                    <select
                                        class="form-select form-select-sm py-2 rounded-3 text-secondary border-light-subtle"
                                        id="filterKategori" onchange="filterData(this.value)">
                                        <option value="ALL" {{ request('category') == '' ? 'selected' : '' }}>Semua
                                            Kategori</option>
                                        <option value="News" {{ request('category') == 'News' ? 'selected' : '' }}>
                                            News</option>
                                        <option value="Education"
                                            {{ request('category') == 'Education' ? 'selected' : '' }}>Education
                                        </option>
                                        <option value="Events" {{ request('category') == 'Events' ? 'selected' : '' }}>
                                            Events</option>
                                        <option value="Informatic"
                                            {{ request('category') == 'Informatic' ? 'selected' : '' }}>Informatic
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-mini-stat h-100 d-flex align-items-center justify-content-between">
                                <div>
                                    <small class="opacity-75 text-uppercase fw-semibold tracking-wider d-block mb-1"
                                        style="font-size: 0.65rem;">Total Postingan</small>
                                    <h3 class="fw-bold mb-0 lh-1">{{ $posts->total() }}</h3>
                                </div>
                                <div class="fs-4 opacity-50"><i class="bi bi-graph-up"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="main-card">
                        <div class="table-responsive">
                            <table class="table table-premium align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 8%">No</th>
                                        <th style="width: 12%">Thumbnail</th>
                                        <th style="width: 45%">Judul Berita</th>
                                        <th style="width: 15%">Kategori</th>
                                        <th style="width: 12%">Tanggal Upload</th>
                                        <th style="width: 8%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($posts as $index => $post)
                                        <tr>
                                            <td class="fw-semibold text-muted" style="font-size: 0.82rem;">
                                                #{{ $posts->firstItem() + $index }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('assets/images/news/' . $post->thumbnail) }}"
                                                    class="table-img" alt="thumb">
                                            </td>
                                            <td>
                                                <span class="fw-semibold text-dark d-block mb-0.5"
                                                    style="font-size: 0.92rem;">{{ $post->title }}</span>
                                                <span class="text-success small fw-medium"
                                                    style="font-size: 0.76rem;">{{ $post->hashtags ?? '#AlHikmah' }}</span>
                                            </td>
                                            <td>
                                                @if ($post->category == 'News')
                                                    <span class="badge-pill-custom bg-pill-news">News</span>
                                                @elseif($post->category == 'Education')
                                                    <span class="badge-pill-custom bg-pill-edu">Education</span>
                                                @elseif($post->category == 'Events')
                                                    <span class="badge-pill-custom bg-pill-event">Events</span>
                                                @else
                                                    <span class="badge-pill-custom bg-pill-info">Informatic</span>
                                                @endif
                                            </td>
                                            <td class="text-muted" style="font-size: 0.8rem;">
                                                {{ $post->created_at->translatedFormat('d M Y') }}
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-1.5">
                                                    <button type="button"
                                                        class="btn btn-action-edit btn-edit-trigger"
                                                        data-bs-toggle="modal" data-bs-target="#modalEditBerita"
                                                        data-id="{{ $post->id }}"
                                                        data-title="{{ $post->title }}"
                                                        data-category="{{ $post->category }}"
                                                        data-hashtags="{{ $post->hashtags }}"
                                                        data-content="{{ $post->content }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-action-delete btn-delete-trigger"
                                                        data-bs-toggle="modal" data-bs-target="#modalHapusBerita"
                                                        data-id="{{ $post->id }}"
                                                        data-title="{{ $post->title }}">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted">
                                                <i class="bi bi-inbox fs-2 opacity-30 d-block mb-2"></i>
                                                <span class="small fw-medium">Belum ada publikasi artikel terdata pada
                                                    kategori ini.</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if ($posts->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-4 px-2">
                                <div class="small text-muted">
                                    Menampilkan {{ $posts->firstItem() }} sampai {{ $posts->lastItem() }} dari
                                    {{ $posts->total() }} berita
                                </div>
                                <div class="pagination-premium">
                                    {{ $posts->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        @endif

                    </div>
                </main>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahBerita" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header py-3 border-bottom border-light px-4">
                    <h5 class="modal-title fw-bold text-dark"><i
                            class="bi bi-file-earmark-plus text-success me-2"></i> Tulis Berita Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4" style="max-height: calc(100vh - 210px); overflow-y: auto;">
                        <div class="row g-3 mb-3.5">
                            <div class="col-md-8">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Judul Berita Utama</label>
                                <input type="text" name="title" class="form-control modal-input-custom"
                                    placeholder="Ketikkan judul artikel..." required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Kategori Konten</label>
                                <select name="category" class="form-select modal-input-custom" required>
                                    <option value="" disabled selected>Pilih Klasifikasi</option>
                                    <option value="News">News</option>
                                    <option value="Education">Education</option>
                                    <option value="Events">Events</option>
                                    <option value="Informatic">Informatic</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3.5">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Thumbnail Berita (Halaman Blog)</label>
                                <input type="file" name="thumbnail" id="input_thumbnail"
                                    class="form-control modal-input-custom" accept="image/*" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Background Detail (Halaman Dalam)</label>
                                <input type="file" name="bg_detail" id="input_bg_detail"
                                    class="form-control modal-input-custom" accept="image/*" required>
                            </div>
                        </div>
                        <div class="mb-3.5">
                            <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                style="font-size: 0.7rem;">Isi Dokumen Narasi Berita</label>
                            <textarea name="content" class="form-control modal-input-custom" rows="7"
                                placeholder="Tuliskan teks narasi lengkap di sini..." required></textarea>
                        </div>
                        <div class="row g-3 mb-3.5">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Gambar Tambahan 1 (Opsional)</label>
                                <input type="file" name="extra_image_1" id="input_extra_image_1"
                                    class="form-control modal-input-custom" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Gambar Tambahan 2 (Opsional)</label>
                                <input type="file" name="extra_image_2" id="input_extra_image_2"
                                    class="form-control modal-input-custom" accept="image/*">
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                style="font-size: 0.7rem;">Hashtag Penanda Aksen</label>
                            <input type="text" name="hashtags" class="form-control modal-input-custom"
                                placeholder="Contoh: #AlHikmah #PondokModern">
                        </div>
                    </div>
                    <div class="modal-footer border-top border-light p-3 px-4 bg-light bg-opacity-40">
                        <button type="button"
                            class="btn btn-light px-4 py-2 rounded-3 fw-medium small text-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit"
                            class="btn btn-submit-modal px-4 py-2 rounded-3 fw-medium small shadow-sm">Terbitkan
                            Konten</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditBerita" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header py-3 border-bottom border-light px-4">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-pencil-square text-primary me-2"></i>
                        Perbarui Data Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditBerita" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4" style="max-height: calc(100vh - 210px); overflow-y: auto;">
                        <div class="row g-3 mb-3.5">
                            <div class="col-md-8">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Judul Berita Utama</label>
                                <input type="text" name="title" id="edit_title"
                                    class="form-control modal-input-custom" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Kategori Konten</label>
                                <select name="category" id="edit_category" class="form-select modal-input-custom"
                                    required>
                                    <option value="News">News</option>
                                    <option value="Education">Education</option>
                                    <option value="Events">Events</option>
                                    <option value="Informatic">Informatic</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3.5">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Ubah Thumbnail (Kosongkan jika tetap)</label>
                                <input type="file" name="thumbnail" id="edit_input_thumbnail"
                                    class="form-control modal-input-custom" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Ubah Background Detail (Kosongkan jika tetap)</label>
                                <input type="file" name="bg_detail" id="edit_input_bg_detail"
                                    class="form-control modal-input-custom" accept="image/*">
                            </div>
                        </div>
                        <div class="mb-3.5">
                            <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                style="font-size: 0.7rem;">Isi Dokumen Narasi Berita</label>
                            <textarea name="content" id="edit_content" class="form-control modal-input-custom" rows="7" required></textarea>
                        </div>
                        <div class="row g-3 mb-3.5">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Ubah Gambar Tambahan 1 (Opsional)</label>
                                <input type="file" name="extra_image_1" id="edit_input_extra_1"
                                    class="form-control modal-input-custom" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                    style="font-size: 0.7rem;">Ubah Gambar Tambahan 2 (Opsional)</label>
                                <input type="file" name="extra_image_2" id="edit_input_extra_2"
                                    class="form-control modal-input-custom" accept="image/*">
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label small fw-bold text-secondary text-uppercase tracking-wider"
                                style="font-size: 0.7rem;">Hashtag Penanda Aksen</label>
                            <input type="text" name="hashtags" id="edit_hashtags"
                                class="form-control modal-input-custom">
                        </div>
                    </div>
                    <div class="modal-footer border-top border-light p-3 px-4 bg-light bg-opacity-40">
                        <button type="button"
                            class="btn btn-light px-4 py-2 rounded-3 fw-medium small text-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit"
                            class="btn btn-submit-modal px-4 py-2 rounded-3 fw-medium small shadow-sm">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalHapusBerita" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-body p-4 text-center">
                    <div class="text-danger mb-3">
                        <i class="bi bi-exclamation-circle-fill" style="font-size: 3.5rem; opacity: 0.85;"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Hapus Berita Permanen?</h5>
                    <p class="text-secondary small mb-4 px-2" style="line-height: 1.5;">
                        Apakah Anda yakin ingin menghapus berita <strong id="delete_news_title"
                            class="text-dark"></strong> beserta seluruh dokumen gambar secara permanen?
                    </p>
                    <form id="formHapusBerita" method="POST">
                        @csrf
                        <div class="d-flex gap-2.5 justify-content-center">
                            <button type="button"
                                class="btn btn-light px-4 py-2.5 rounded-3 fw-medium small w-50 text-secondary"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit"
                                class="btn btn-danger px-4 py-2.5 rounded-3 fw-medium small w-50 shadow-sm">Ya,
                                Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // SCRIPT FILTER KATEGORI OTOMATIS
        function filterData(val) {
            if (val === "ALL") {
                window.location.href = "{{ route('admin.posts.index') }}";
            } else {
                window.location.href = "{{ route('admin.posts.index') }}?category=" + val;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // --- VALIDASI INSTAN UKURAN GAMBAR (MAKSIMAL 12 MB) ---
            const maxSizeBytes = 12 * 1024 * 1024; // Konversi 12 MB ke Satuan Bytes
            const fileInputs = [{
                    element: document.getElementById('input_thumbnail'),
                    name: 'Thumbnail'
                },
                {
                    element: document.getElementById('input_bg_detail'),
                    name: 'Background Detail'
                },
                {
                    element: document.getElementById('input_extra_image_1'),
                    name: 'Extra Image 1'
                },
                {
                    element: document.getElementById('input_extra_image_2'),
                    name: 'Extra Image 2'
                },

                {
                    element: document.getElementById('edit_input_thumbnail'),
                    name: 'Thumbnail (Edit)'
                },
                {
                    element: document.getElementById('edit_input_bg_detail'),
                    name: 'Background Detail (Edit)'
                },
                {
                    element: document.getElementById('edit_input_extra_1'),
                    name: 'Gambar Tambahan 1 (Edit)'
                },
                {
                    element: document.getElementById('edit_input_extra_2'),
                    name: 'Gambar Tambahan 2 (Edit)'
                }
            ];

            fileInputs.forEach(item => {
                if (item.element) {
                    item.element.addEventListener('change', function() {
                        if (this.files.length > 0) {
                            const fileSize = this.files[0].size;

                            if (fileSize > maxSizeBytes) {
                                // Tampilkan pesan instan tanpa load server
                                alert(
                                    `Gagal: Ukuran file ${item.name} terlalu besar! Maksimal ukuran yang diperbolehkan adalah 12 MB. File yang Anda pilih berukuran ${(fileSize / 1024 / 1024).toFixed(2)} MB.`
                                );

                                // Reset isi input file menjadi kosong kembali
                                this.value = '';
                            }
                        }
                    });
                }
            });
            // LOGIKA MODAL EDIT
            const editButtons = document.querySelectorAll('.btn-edit-trigger');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const category = this.getAttribute('data-category');
                    const hashtags = this.getAttribute('data-hashtags');
                    const content = this.getAttribute('data-content');

                    document.getElementById('edit_title').value = title;
                    document.getElementById('edit_category').value = category;
                    document.getElementById('edit_hashtags').value = hashtags;
                    document.getElementById('edit_content').value = content;

                    document.getElementById('formEditBerita').action = `/admin/posts/${id}`;
                });
            });

            // LOGIKA MODAL HAPUS
            const deleteButtons = document.querySelectorAll('.btn-delete-trigger');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');

                    document.getElementById('delete_news_title').innerText = `"${title}"`;
                    document.getElementById('formHapusBerita').action = `/admin/posts/${id}/delete`;
                });
            });
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
