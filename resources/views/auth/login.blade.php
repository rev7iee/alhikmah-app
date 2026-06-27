<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Admin - Al Hikmah</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-green: #1e5e2f;
            --light-green: #27743e;
            --bg-input: #f0f4f8;
            --text-secondary: #64748b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* --- SISI KIRI: HERO IMAGE & OVERLAY GRADASI --- */
        .hero-side {
            position: relative;
            background-image: url("{{ asset('assets/images/hero.webp') }}"), url("https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=1000");
            /* Image fallback jika lokal belum ada */
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-column: column;
            justify-content: space-between;
            padding: 45px;
            z-index: 1;
        }

        .hero-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Efek gradien hijau mulus ke transparan sesuai desain */
            background: linear-gradient(to top, rgba(30, 94, 47, 0.95) 0%, rgba(30, 94, 47, 0.6) 50%, rgba(0, 0, 0, 0.2) 100%);
            z-index: -1;
        }

        .logo-brand-top {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-box {
            width: 42px;
            height: 42px;
            background-color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .hero-headline h1 {
            font-size: 2.8rem;
            font-weight: 700;
            line-height: 1.2;
        }

        /* --- SISI KANAN: FORM INPUT AREA --- */
        .form-side {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 60px 40px 30px 40px;
            background-color: #ffffff;
        }

        .form-container {
            max-width: 420px;
            width: 100%;
            margin: auto;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-group-custom i.prefix-icon {
            position: absolute;
            left: 16px;
            color: #94a3b8;
            font-size: 1.1rem;
        }

        .form-control-custom {
            width: 100%;
            background-color: var(--bg-input);
            border: 1px solid transparent;
            padding: 14px 16px 14px 46px;
            border-radius: 12px;
            font-size: 0.95rem;
            color: #1e293b;
            font-weight: 400;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            background-color: #ffffff;
            border-color: var(--light-green);
            box-shadow: 0 0 0 4px rgba(39, 116, 62, 0.1);
            outline: none;
        }

        .form-control-custom::placeholder {
            color: #94a3b8;
        }

        /* Penyesuaian khusus padding kanan form password untuk tombol mata */
        .form-control-custom.pass-field {
            padding-right: 46px;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--light-green);
        }

        .form-label-custom {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #475569;
            margin-bottom: 8px;
            display: block;
        }

        .btn-login-custom {
            background-color: var(--primary-green);
            color: #ffffff;
            font-weight: 500;
            font-size: 1.05rem;
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-login-custom:hover {
            background-color: var(--light-green);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(30, 94, 47, 0.2);
        }

        .footer-link {
            color: var(--text-secondary);
            font-size: 0.85rem;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-link:hover {
            color: var(--primary-green);
        }

        /* Responsive Breakpoint */
        @media (max-width: 767.98px) {
            .hero-side {
                display: none !important;
                /* Sembunyikan sisi kiri di layar HP */
            }

            .form-side {
                padding: 40px 20px 20px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid px-0">
        <div class="row g-0">

            <div class="col-md-6 col-lg-7 d-flex flex-column hero-side text-white">
                <div class="logo-brand-top">
                    <div class="logo-box">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 42px;"
                            onerror="this.src='https://via.placeholder.com/24?text=H'">
                    </div>
                    <div>
                        <div class="fw-bold lh-1 small text-uppercase tracking-wider">Al-Hikmah</div>
                        <span style="font-size: 0.65rem; opacity: 0.8; letter-spacing: 0.5px;"
                            class="text-uppercase">Pondok Pesantren</span>
                    </div>
                </div>

                <div class="hero-headline mb-4" style="max-width: 540px;">
                    <h1 class="mb-3">Membentuk Generasi Qur'ani yang Mandiri.</h1>
                    <p class="mb-0 opacity-75 small">Selamat datang di Portal Administrasi Al-Hikmah Boarding School.
                        Silakan masuk untuk mengelola data akademik, administrasi santri, dan perkembangan institusi
                        secara aman.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 d-flex flex-column form-side">

                <div class="form-container">
                    <div class="mb-5">
                        <h2 class="fw-bold text-dark mb-1">Portal Admin</h2>
                        <p class="text-muted small">Masuk untuk melanjutkan ke panel kontrol administrasi.</p>
                    </div>

                    @if ($errors->any())
                        <div
                            class="alert alert-danger border-0 small py-2.5 rounded-3 mb-4 d-flex align-items-center gap-2">
                            <i class="bi bi-exclamation-triangle-fill fs-6"></i>
                            <div>{{ $errors->first() }}</div>
                        </div>
                    @endif

                    <form action="{{ url('/admin-login') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label-custom">Email atau Username</label>
                            <div class="input-group-custom">
                                <i class="bi bi-person prefix-icon"></i>
                                <input type="email" name="email" class="form-control-custom"
                                    placeholder="admin@alhikmah.sch.id" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label-custom mb-0">Kata Sandi</label>
                                <a href="#" class="small text-decoration-none fw-semibold text-dark"
                                    style="font-size: 0.75rem;">Lupa Password?</a>
                            </div>
                            <div class="input-group-custom">
                                <i class="bi bi-lock prefix-icon"></i>
                                <input type="password" name="password" id="passwordField"
                                    class="form-control-custom pass-field" placeholder="••••••••" required>
                                <i class="bi bi-eye toggle-password" id="togglePasswordIcon"></i>
                            </div>
                        </div>

                        <div class="mb-4 d-flex align-items-center">
                            <input class="form-check-input me-2 mt-0" type="checkbox" id="rememberMe"
                                style="width: 18px; height: 18px; cursor: pointer;">
                            <label class="form-check-label text-secondary small" for="rememberMe"
                                style="cursor: pointer; user-select: none;">
                                Ingat saya di perangkat ini
                            </label>
                        </div>

                        <button type="submit" class="btn btn-login-custom shadow-sm mb-4">
                            <span>Login</span> <i class="bi bi-box-arrow-in-right"></i>
                        </button>

                        <div class="text-center pt-2">
                            <small class="text-muted d-block mb-2">Butuh bantuan teknis?</small>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="https://wa.me/+628999711295" target="_blank"
                                    class="footer-link fw-medium small"><i class="bi bi-headset me-1"></i> Hubungi
                                    Support</a>
                                <a href="{{ url('/') }}" class="footer-link fw-medium small"><i
                                        class="bi bi-book me-1"></i> Panduan</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="text-center mt-5">
                    <span style="font-size: 0.7rem; color: #a0aec0; letter-spacing: 0.3px;" class="d-block">
                        &copy; 2026 Al-Hikmah Boarding School. Secure Admin Portal v2.1.0
                    </span>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const passwordField = document.getElementById('passwordField');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');

        togglePasswordIcon.addEventListener('click', function() {
            // Tukar tipe input antar password dan text
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Tukar ikon mata terbuka dan tertutup
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>
</body>

</html>
