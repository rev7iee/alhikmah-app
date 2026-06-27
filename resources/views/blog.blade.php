<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog & Berita - Al Hikmah Boarding School</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- Bootstrap 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <!-- Custom CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <style>
        body {
            animation: none !important;
            transform: none !important;
            overflow-x: hidden;
        }

        #page-wrapper {
            animation: fadeInAnimation ease 0.4s forwards;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: #0a4d26 !important;
            border-color: #0a4d26 !important;
            color: #ffffff !important;
        }

        .custom-pagination .page-link {
            color: #116934;
            border-radius: 6px;
            margin: 0 3px;
        }

        .custom-pagination .page-link:hover {
            background-color: #f4f7f5;
            color: #0a4d26;
        }
    </style>
</head>

<body>

    <div id="page-wrapper">

        <!-- ========================================================================= -->
        <!-- 1. TOP ANNOUNCEMENT BAR                                                   -->
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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/blog') }}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                    </ul>
                    <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
                </div>
            </div>
        </nav>

        <!-- ========================================================================= -->
        <!-- 3. HEADER BLOG                                                            -->
        <!-- ========================================================================= -->
        <header class="bg-white pt-5 pb-4">
            <div class="container">
                <h1 class="display-5 fw-bold mb-2" style="color: #0a4d26">Berita Al Hikmah</h1>
                <p class="text-secondary mb-0">Temukan kisah pertumbuhan spiritual, keunggulan akademik, dan dinamika
                    kehidupan santri di Al Hikmah Boarding School.</p>
            </div>
        </header>

        <!-- ========================================================================= -->
        <!-- 4. FEATURED POST (Berita yang baru saja di-upload/di-perbarui)             -->
        <!-- ========================================================================= -->
        @if ($featuredPost)
            <section class="pb-5 bg-white">
                <div class="container">
                    <div class="card featured-box shadow-sm position-relative border-0">
                        <span class="badge-featured" style="background-color: #0a4d26;">Featured Post</span>
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <img src="{{ asset('assets/images/news/' . $featuredPost->thumbnail) }}"
                                    alt="{{ $featuredPost->title }}" class="img-fluid w-100 featured-img"
                                    style="min-height: 380px; object-fit: cover;"
                                    onerror="this.src='https://via.placeholder.com/700x400?text=Featured+Al+Hikmah'" />
                            </div>
                            <div class="col-lg-5 d-flex align-items-center">
                                <div class="p-4 p-md-5">
                                    <span class="text-uppercase text-muted fw-bold d-block mb-2"
                                        style="font-size: 0.75rem; letter-spacing: 0.5px">
                                        {{ $featuredPost->category }} •
                                        {{ $featuredPost->updated_at->translatedFormat('F d, Y') }}
                                    </span>
                                    <h3 class="fw-bold mb-3" style="color: #0a4d26; line-height: 1.4">
                                        {{ $featuredPost->title }}
                                    </h3>
                                    <p class="text-secondary small mb-4" style="line-height: 1.6">
                                        {{ \Str::limit(strip_tags($featuredPost->content), 160) }}
                                    </p>
                                    <a href="{{ url('/blog/detail/' . $featuredPost->id) }}"
                                        class="text-success fw-semibold text-decoration-none small d-inline-flex align-items-center gap-1 mt-2">
                                        Baca Selengkapnya <i class="bi bi-chevron-right" style="font-size: 0.7rem"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- ========================================================================= -->
        <!-- 5. ALL POSTS GRID & INTERACTIVE LIVE FILTERS (Konsep Penyaringan)          -->
        <!-- ========================================================================= -->
        <section class="py-5" style="background-color: #f7f9fc">
            <div class="container">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                    <h3 class="blog-heading-all mb-0">All Posts</h3>

                    <form action="{{ url('/blog') }}" method="GET" class="row g-2 align-items-center">
                        <div class="col-auto">
                            <select name="category"
                                class="form-select form-select-sm border-0 shadow-sm px-3 py-2 rounded-3"
                                onchange="this.form.submit()">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat }}"
                                        {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-auto">
                            <select name="sort"
                                class="form-select form-select-sm border-0 shadow-sm px-3 py-2 rounded-3"
                                onchange="this.form.submit()">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru
                                    Upload</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama
                                    Upload</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="row g-4">
                    @forelse($allPosts as $post)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-3">
                                <img src="{{ asset('assets/images/news/' . $post->thumbnail) }}" class="card-img-top"
                                    alt="{{ $post->title }}" style="height: 220px; object-fit: cover;"
                                    onerror="this.src='https://via.placeholder.com/350x220?text=Warta+Al+Hikmah'" />
                                <div class="card-body p-4 bg-white d-flex flex-column justify-content-between">
                                    <div>
                                        <span class="text-uppercase text-muted fw-semibold d-block mb-2"
                                            style="font-size: 0.7rem">
                                            {{ $post->category }} •
                                            {{ $post->created_at->translatedFormat('F d, Y') }}
                                        </span>
                                        <h5 class="card-title fw-bold mb-3"
                                            style="font-size: 1.1rem; color: #0a4d26; line-height: 1.4;">
                                            {{ $post->title }}
                                        </h5>
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
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-journal-x display-4 text-muted d-block mb-3"></i>
                            <p class="text-muted">Tidak ditemukan warta berita yang sesuai dengan filter pencarian
                                kamu.</p>
                        </div>
                    @endforelse
                </div>

                <!-- ========================================================================= -->
                <!-- 6. PAGINATION DISPATCHER (Menggunakan Standardisasi Bootstrap 5 Rapi)      -->
                <!-- ========================================================================= -->
                <div class="d-flex justify-content-center mt-5 custom-pagination">
                    {{ $allPosts->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- 7. NEWSLETTER BANNER                                                      -->
        <!-- ========================================================================= -->
        <section class="py-5" style="background-color: #116934; color: white">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-md-7">
                        <h3 class="fw-bold mb-2">Subscribe to our newsletter</h3>
                        <p class="mb-0 opacity-75 small">Tetap dapatkan informasi ter-update mengenai berita sekolah,
                            agenda kegiatan, dan tips edukasi islami langsung di email kamu.</p>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="email" class="form-control border-0 px-3 py-2.5"
                                placeholder="Enter your email" aria-label="Enter your email" />
                            <button class="btn btn-warning fw-semibold px-4" type="button"
                                style="background-color: #f1b80c; border-color: #f1b80c; color: #000;">Subscribe</button>
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

    </div>

    <!-- Bootstrap 5 Bundle JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS Eksternal Milikmu -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
