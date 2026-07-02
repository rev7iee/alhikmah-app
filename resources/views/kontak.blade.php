<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hubungi Kami - Al Hikmah</title>
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
        }

        #page-wrapper {
            animation: fadeInAnimation ease 0.4s forwards;
        }
    </style>
</head>

<body style="background-color: #f8fafc; overflow-x: hidden;">

    <!-- ========================================================================= -->
    <!-- 1. TOP ANNOUNCEMENT BAR                                                   -->
    <!-- ========================================================================= -->
    <div class="top-bar text-center py-2 px-3">
        <span>{{ $settings['top_announcement'] ?? 'Penerimaan Santri Baru Tahun Ajaran 2026/2027 Telah Dibuka!' }}</span>
    </div>

    <!-- ========================================================================= -->
    <!-- NAVBAR                                                                    -->
    <!-- ========================================================================= -->
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/profil') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/kontak') }}">Kontak</a></li>
                </ul>
                <a href="{{ url('/') }}" class="btn btn-accent px-4 py-2">PSB</a>
            </div>
        </div>
    </nav>

    <div id="page-wrapper" style="overflow-x: hidden; width: 100%;">

        <!-- ========================================================================= -->
        <!-- HERO HEADER KONTAK                                                        -->
        <!-- ========================================================================= -->
        <header class="bg-white py-5">
            <div class="container py-3">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <span class="badge bg-success mb-3 px-3 py-2 text-dark fw-medium"
                            style="background-color: #d1e7dd !important; color: #0f5132 !important; border-radius: 30px;">CONTACT
                            OUR TEAM</span>
                        <h1 class="display-5 fw-bold mb-3" style="color: #0a4d26; line-height: 1.3">Let's connect and
                            build a bright future together</h1>
                        <p class="text-secondary mb-0" style="line-height: 1.7">Memiliki pertanyaan seputar kurikulum,
                            kehidupan santri, atau pendaftaran? Kami siap memberikan bimbingan dan kejelasan informasi
                            yang Anda butuhkan untuk perjalanan spiritual dan akademik putra-putri Anda.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ !empty($settings['pondok_campus_image']) ? asset('assets/images/' . $settings['pondok_campus_image']) : asset('assets/images/lokasi.jpg') }}"
                            alt="Gedung Al Hikmah" class="img-fluid rounded-4 shadow-sm w-100"
                            style="max-height: 380px; object-fit: cover;" />
                    </div>
                </div>
            </div>
        </header>

        <!-- ========================================================================= -->
        <!-- MAIN CONTACT SECTION & FORM                                               -->
        <!-- ========================================================================= -->
        <section class="py-5" style="background-color: #f4f7f5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="d-grid gap-3">
                            <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="icon-box-contact"><i class="bi bi-geo-alt"></i></div>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Our Location</h6>
                                        <p class="small text-secondary mb-0">
                                            {{ $settings['pondok_address'] ?? 'Jl. Raya Al Hikmah No. 123, Indonesia' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="icon-box-contact"><i class="bi bi-telephone"></i></div>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Phone & WhatsApp</h6>
                                        <p class="small text-secondary mb-0">
                                            {{ $settings['pondok_phone'] ?? '+62 812-3456-7890' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="icon-box-contact"><i class="bi bi-envelope"></i></div>
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Email Address</h6>
                                        <p class="small text-secondary mb-0">
                                            {{ $settings['pondok_email'] ?? 'info@alhikmah.sch.id' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 px-2">
                            <span class="small text-muted d-block mb-2 fw-medium">Follow Our Journey</span>
                            <div class="d-flex">
                                <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm p-4 p-md-5 bg-white rounded-4">
                            <h3 class="fw-bold mb-4" style="color: #0a4d26">Send us a Message</h3>

                            <form class="form-contact" id="emailGeneratorForm">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold text-secondary">Full Name</label>
                                        <input type="text" id="form-name" class="form-control"
                                            placeholder="Enter your full name" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold text-secondary">Your Email
                                            Address</label>
                                        <input type="email" id="form-email" class="form-control"
                                            placeholder="you@example.com" required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-secondary">Subject</label>
                                    <select class="form-select" id="form-subject">
                                        <option value="Pertanyaan Umum (General Inquiry)">General Inquiry</option>
                                        <option value="Pertanyaan Pendaftaran Santri Baru (Admission Question)">
                                            Admission Question</option>
                                        <option value="Kemitraan & Kerjasama (Partnership & Cooperation)">Partnership &
                                            Cooperation</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small fw-semibold text-secondary">Your Message</label>
                                    <textarea id="form-message" class="form-control" rows="4" placeholder="How can we help you?" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success px-5 py-2.5 fw-medium shadow-sm"
                                    style="background-color: #0a4d26; border: none; border-radius: 30px;">
                                    <i class="bi bi-envelope-fill me-2"></i> Send Message via Email
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- FIND US ON THE MAP                                                        -->
        <!-- ========================================================================= -->
        <section class="py-5" style="background-color: #e6eefc">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h3 class="fw-bold mb-1" style="color: #0a4d26">Find Us on the Map</h3>
                        <p class="text-secondary small mb-0">Terletak di lingkungan yang asri dan tenang, menyediakan
                            suasana kondusif untuk fokus belajar santri.</p>
                    </div>
                    <a href="https://maps.google.com" target="_blank"
                        class="text-primary small fw-semibold text-decoration-none">Open in Google Maps <i
                            class="bi bi-box-arrow-up-right small"></i></a>
                </div>

                <div class="map-wrapper shadow-sm">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2560818965108!2d109.90573557457202!3d-7.762643992256504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7ac309cd6e9895%3A0x302135cf1c8426ea!2sPondok%20Pesantren%20Al%20Hikmah!5e0!3m2!1sid!2sid!4v1781703456867!5m2!1sid!2sid"
                        width="100%" height="380" style="border: 0; display: block" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        <!-- ========================================================================= -->
        <!-- 4. CTA TOUR BANNER (UX WRITER RAMPING - TANPA BUTTON CTA)                 -->
        <!-- ========================================================================= -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="cta-tour-banner p-4 p-md-5 text-center shadow-sm" style="background-color: #0a4d26;">
                    <h2 class="fw-bold mb-3 display-6">Pintu Kami Selalu Terbuka untuk Anda</h2>
                    <p class="text-white-50 small mb-0 mx-auto"
                        style="max-width: 700px; line-height: 1.7; font-size: 0.98rem;">
                        Kami memahami bahwa memilih pendidikan terbaik untuk putra-putri Anda adalah keputusan besar.
                        Staf pengajar dan tim akademik Al Hikmah siap menyambut kehadiran Anda untuk berdiskusi,
                        berkonsultasi, atau sekadar melihat langsung bagaimana lingkungan pesantren kami membentuk
                        karakter generasi Qurani masa depan.
                    </p>
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

    </div>

    <!-- Bootstrap 5 Bundle JS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS Eksternal -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        document.getElementById('emailGeneratorForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const adminEmail = "{{ $settings['pondok_email'] ?? 'info@alhikmah.sch.id' }}";
            const name = document.getElementById('form-name').value;
            const userEmail = document.getElementById('form-email').value;
            const selectSubject = document.getElementById('form-subject').value;
            const message = document.getElementById('form-message').value;
            const emailSubject = encodeURIComponent(`[Website Inquiry] ${selectSubject}`);
            const emailBody = encodeURIComponent(
                `Halo Admin Al Hikmah,\n\n` +
                `Ada pesan baru dari halaman kontak website:\n` +
                `--------------------------------------------------\n` +
                `Nama Pengirim : ${name}\n` +
                `Email Pengirim: ${userEmail}\n` +
                `Subjek         : ${selectSubject}\n` +
                `--------------------------------------------------\n\n` +
                `Isi Pesan:\n${message}\n\n` +
                `Mohon untuk segera merespon pesan ini. Terima kasih.`
            );

            window.location.href = `mailto:${adminEmail}?subject=${emailSubject}&body=${emailBody}`;
        });
    </script>
</body>

</html>
