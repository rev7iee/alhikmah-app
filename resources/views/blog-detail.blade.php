<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $post->title }} - Al Hikmah Boarding School</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <style>
        /* Sinkronisasi penetralan gaya transform sesuai standarisasi file welcome sebelumnya */
        body {
            animation: none !important;
            transform: none !important;
        }

        #page-wrapper {
            animation: fadeInAnimation ease 0.4s forwards;
        }
    </style>
</head>

<body style="background-color: #f8fafc">

    <div id="page-wrapper">

        <div class="top-bar text-center py-2 px-3">
            <span>{{ $settings['top_announcement'] ?? 'Penerimaan Santri Baru Tahun Ajaran 2026/2027 Telah Dibuka!' }}</span>
        </div>

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
                        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                    </ul>
                    <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
                </div>
            </div>
        </nav>

        <header class="container my-4">
            <div class="position-relative rounded-4 overflow-hidden shadow-sm" style="min-height: 400px">
                <img src="{{ asset('assets/images/news/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                    class="position-absolute w-100 h-100" style="object-fit: cover; z-index: 1"
                    onerror="this.src='https://via.placeholder.com/1200x500?text=Warta+Al+Hikmah'" />
                <div class="position-absolute w-100 h-100"
                    style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(10, 77, 38, 0.9)); z-index: 2;">
                </div>

                <div class="position-absolute bottom-0 start-0 p-4 p-md-5 text-white"
                    style="z-index: 3; max-width: 850px">
                    <span class="badge bg-success mb-3 px-3 py-2 text-uppercase fw-semibold"
                        style="letter-spacing: 0.5px; font-size: 0.75rem">{{ $post->category }}</span>
                    <span class="ms-2 small opacity-75"><i class="bi bi-calendar3 me-1"></i>
                        {{ $post->created_at->translatedFormat('d F Y') }}</span>
                    <h1 class="fw-bold display-6 mt-2" style="line-height: 1.3">{{ $post->title }}</h1>
                </div>
            </div>
        </header>

        <main class="container mb-5">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                        <div class="text-secondary mb-4"
                            style="line-height: 1.8; text-align: justify; font-size: 1.02rem;">
                            {!! $post->content !!}
                        </div>

                        @if (!empty($post->image_1) || !empty($post->image_2))
                            <div class="row g-3 my-4">
                                @if (!empty($post->image_1))
                                    <div class="{{ !empty($post->image_2) ? 'col-md-6' : 'col-12' }}">
                                        <img src="{{ asset('assets/images/news/' . $post->image_1) }}"
                                            class="img-fluid rounded-3 shadow-sm w-100"
                                            style="max-height: 300px; object-fit: cover;" alt="Dokumentasi 1">
                                    </div>
                                @endif
                                @if (!empty($post->image_2))
                                    <div class="{{ !empty($post->image_1) ? 'col-md-6' : 'col-12' }}">
                                        <img src="{{ asset('assets/images/news/' . $post->image_2) }}"
                                            class="img-fluid rounded-3 shadow-sm w-100"
                                            style="max-height: 300px; object-fit: cover;" alt="Dokumentasi 2">
                                    </div>
                                @endif
                            </div>
                        @endif

                        <hr class="my-4 opacity-25" />

                        <div class="d-flex flex-wrap gap-2">
                            @if (!empty($post->hashtags))
                                @foreach (explode(',', $post->hashtags) as $tag)
                                    <span
                                        class="badge bg-light text-muted border px-3 py-2 rounded-pill small">{{ trim($tag) }}</span>
                                @endforeach
                            @else
                                <span
                                    class="badge bg-light text-muted border px-3 py-2 rounded-pill small">#AlHikmahBoardingSchool</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                        <h6 class="fw-bold text-dark mb-3">Share This Article</h6>
                        <div class="d-flex gap-2">
                            <a href="https://api.whatsapp.com/send?text={{ rawurlencode($post->title . ' - Read more at: ' . request()->url()) }}"
                                target="_blank"
                                class="btn btn-light border rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;" title="Bagikan ke WhatsApp">
                                <i class="bi bi-whatsapp text-success fs-5"></i>
                            </a>
                            <button type="button" onclick="copyCurrentUrl()"
                                class="btn btn-light border rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;" title="Salin Tautan Artikel">
                                <i class="bi bi-link-45deg text-secondary fs-4"></i>
                            </button>
                            <small id="copyToast" class="text-success small fw-medium ms-2 align-self-center"
                                style="display: none;"><i class="bi bi-check-circle"></i> Copied!</small>
                        </div>
                    </div>

                    <div class="p-4 rounded-4 shadow-sm text-white" style="background-color: #0a4d26">
                        <h5 class="fw-bold mb-2">Join Our Newsletter</h5>
                        <p class="small text-white-50 mb-4">Tetap dapatkan update informasi warta berita terbaru and
                            agenda kegiatan pondok pesantren langsung di email kamu.</p>
                        <form>
                            <input type="email" class="form-control mb-3 border-0 py-2 px-3"
                                placeholder="Your email address"
                                style="background-color: rgba(255, 255, 255, 0.15); color: white;" />
                            <button type="submit" class="btn btn-warning w-100 fw-bold py-2"
                                style="background-color: #f1b80c; border: none; color: black">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <section class="py-5 bg-white border-top">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-1" style="color: #0a4d26">Related News</h3>
                        <p class="text-muted small mb-0">Wawasan lebih mendalam seputar ekosistem pendidikan Al Hikmah.
                        </p>
                    </div>
                    <a href="{{ url('/blog') }}" class="text-success fw-semibold text-decoration-none small">View
                        All News <i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="row g-4">
                    @forelse($relatedPosts as $related)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-3 bg-light">
                                <img src="{{ asset('assets/images/news/' . $related->thumbnail) }}"
                                    class="card-img-top" alt="{{ $related->title }}"
                                    style="height: 180px; object-fit: cover;"
                                    onerror="this.src='https://via.placeholder.com/350x180?text=Al+Hikmah+News'" />
                                <div class="card-body p-4">
                                    <!-- Kategori Berita -->
                                    <span class="text-uppercase text-muted fw-bold d-block mb-2"
                                        style="font-size: 0.68rem">{{ $related->category }}</span>

                                    <!-- TAMBAHAN: Judul Berita Terkait di Bawah Kategori -->
                                    <h5 class="fw-bold mb-3" style="font-size: 1.05rem; line-height: 1.4;">
                                        <a href="{{ url('/blog/detail/' . $related->id) }}"
                                            class="text-dark text-decoration-none hover-link">
                                            {{ $related->title }}
                                        </a>
                                    </h5>

                                    <!-- Cuplikan Isi Berita -->
                                    <p class="text-secondary small card-text mb-2">
                                        {{ \Str::limit(strip_tags($related->content), 90) }}
                                    </p>

                                    <h6 class="mb-0">
                                        <!-- PERBAIKAN: Mengubah $post->id menjadi $related->id agar nge-link ke berita yang sesuai -->
                                        <a href="{{ url('/blog/detail/' . $related->id) }}"
                                            class="text-success fw-semibold text-decoration-none small d-inline-flex align-items-center gap-1 mt-2">
                                            Baca Selengkapnya <i class="bi bi-chevron-right"
                                                style="font-size: 0.7rem"></i>
                                        </a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-3">
                            <p class="text-muted small">Tidak ditemukan artikel terkait lainnya.</p>
                        </div>
                    @endforelse
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        function copyCurrentUrl() {
            // Ambil URL halaman aktif saat ini
            const dummyUrl = window.location.href;

            // Buat elemen input bayangan untuk memproses salin teks
            const tempInput = document.createElement("input");
            tempInput.value = dummyUrl;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            // Munculkan teks notifikasi sukses sesaat
            const toast = document.getElementById("copyToast");
            toast.style.display = "inline";
            setTimeout(() => {
                toast.style.display = "none";
            }, 2000);
        }
    </script>
</body>

</html>
