<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postingan Galeri - Al Hikmah</title>

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

        .sidebar {
            background-color: var(--bg-sidebar);
            min-height: 100vh;
            color: white;
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
            padding: 24px;
        }

        .btn-add-foto {
            background-color: var(--dark-green);
            color: #ffffff;
            border: 1px solid var(--dark-green);
            font-weight: 500;
            font-size: 0.88rem;
            padding: 10px 18px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-add-foto:hover {
            background-color: #ffffff;
            color: var(--dark-green);
        }

        .btn-add-video {
            background-color: #dc2626;
            color: #ffffff;
            border: 1px solid #dc2626;
            font-weight: 500;
            font-size: 0.88rem;
            padding: 10px 18px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-add-video:hover {
            background-color: #ffffff;
            color: #dc2626;
        }

        .table-premium th {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--text-muted);
            background-color: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 14px 16px;
        }

        .table-premium td {
            padding: 16px;
            font-size: 0.88rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .modal-input-custom {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.92rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-0">
        <div class="row g-0">

            <!-- SIDEBAR -->
            <div class="col-md-3 col-lg-2 px-0 sidebar d-flex flex-column justify-content-between pb-4">
                <div>
                    <div class="p-4 text-center border-bottom border-white border-opacity-10 mb-3">
                        <h5 class="fw-bold mb-0 text-white">Al–Hikmah</h5>
                        <span class="text-white-50 opacity-70"
                            style="font-size: 0.65rem; text-transform: uppercase;">Pondok Pesantren</span>
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
                            <a class="nav-link" href="{{ route('admin.galleries.index') }}"><i
                                    class="bi bi-images me-3"></i> Postingan Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.settings') }}">
                                <i class="bi bi-sliders2 me-3"></i> Setting Website
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- KONTEN UTAMA -->
            <div class="col-md-9 col-lg-10 px-0 d-flex flex-column">

                <nav class="navbar navbar-top navbar-light justify-content-between">
                    <div>
                        <span class="text-success fw-medium small d-block" style="font-size: 0.8rem;">Gallery
                            Control</span>
                        <small class="text-muted small">Kelola koleksi foto dokumentasi dan video YouTube Al
                            Hikmah.</small>
                    </div>
                </nav>

                <main class="p-4 flex-grow-1">

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold text-dark mb-0">Postingan Galeri</h3>

                        <!-- DUA TOMBOL TAMBAH TERPISAH (FOTO DAN VIDEO) -->
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-add-foto shadow-sm d-flex align-items-center gap-2"
                                data-bs-toggle="modal" data-bs-target="#modalTambahFoto">
                                <i class="bi bi-image"></i> <span>Tambah Foto</span>
                            </button>
                            <button type="button" class="btn btn-add-video shadow-sm d-flex align-items-center gap-2"
                                data-bs-toggle="modal" data-bs-target="#modalTambahVideo">
                                <i class="bi bi-youtube"></i> <span>Tambah Video</span>
                            </button>
                        </div>
                    </div>

                    @if (session('success'))
                        <div
                            class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill fs-5"></i> <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
                            <ul class="mb-0 small ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- BARIS SEARCH & FILTER TABEL ADMIN -->
                    <div class="row g-3 mb-4 align-items-center">
                        <div class="col-md-8 col-lg-6">
                            <form action="{{ route('admin.galleries.index') }}" method="GET" class="d-flex gap-2">
                                <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                    <span class="input-group-text bg-white border-end-0 ps-3 text-muted"><i
                                            class="bi bi-search"></i></span>
                                    <input type="text" name="keyword" class="form-control border-start-0 py-2"
                                        placeholder="Cari judul atau caption galeri..."
                                        value="{{ request('keyword') }}">
                                </div>
                                <select name="type" class="form-select py-2 shadow-sm rounded-3 text-secondary"
                                    style="max-width: 170px;" onchange="this.form.submit()">
                                    <option value="">Semua Tipe</option>
                                    <option value="image" {{ request('type') == 'image' ? 'selected' : '' }}>Khusus
                                        Foto</option>
                                    <option value="video" {{ request('type') == 'video' ? 'selected' : '' }}>Khusus
                                        Video</option>
                                </select>
                                @if (request('keyword') || request('type'))
                                    <a href="{{ route('admin.galleries.index') }}"
                                        class="btn btn-light border py-2 px-3 rounded-3 text-secondary"
                                        title="Reset"><i class="bi bi-arrow-counterclockwise"></i></a>
                                @endif
                            </form>
                        </div>
                    </div>

                    <div class="main-card">
                        <div class="table-responsive">
                            <table class="table table-premium align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Media Preview</th>
                                        <th style="width: 30%">Judul Dokumentasi</th>
                                        <th style="width: 12%">Tipe</th>
                                        <th style="width: 28%">Caption / Keterangan</th>
                                        <th style="width: 10%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($galleries as $index => $item)
                                        <tr>
                                            <td class="fw-semibold text-muted">#{{ $galleries->firstItem() + $index }}
                                            </td>
                                            <td>
                                                @if ($item->type === 'image')
                                                    <img src="{{ asset('assets/images/gallery/' . $item->file_or_link) }}"
                                                        class="rounded shadow-sm"
                                                        style="width:65px; height:45px; object-fit:cover;">
                                                @else
                                                    @php
                                                        preg_match(
                                                            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                                                            $item->file_or_link,
                                                            $matches,
                                                        );
                                                        $youtubeId = $matches[1] ?? '';
                                                    @endphp
                                                    @if ($youtubeId)
                                                        <img src="https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg"
                                                            class="rounded shadow-sm"
                                                            style="width:65px; height:45px; object-fit:cover;">
                                                    @else
                                                        <span class="badge bg-danger">YouTube</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="fw-semibold text-dark">{{ $item->title }}</td>
                                            <td>
                                                @if ($item->type === 'image')
                                                    <span
                                                        class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-20 px-3 py-1.5 rounded-pill">FOTO</span>
                                                @else
                                                    <span
                                                        class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-20 px-3 py-1.5 rounded-pill">VIDEO</span>
                                                @endif
                                            </td>
                                            <td class="text-muted small">{{ Str::limit($item->caption, 50) ?? '-' }}
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    @if ($item->type === 'image')
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-success btn-edit-foto"
                                                            data-id="{{ $item->id }}"
                                                            data-title="{{ $item->title }}"
                                                            data-caption="{{ $item->caption }}"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditFoto">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-danger btn-edit-video"
                                                            data-id="{{ $item->id }}"
                                                            data-title="{{ $item->title }}"
                                                            data-link="{{ $item->file_or_link }}"
                                                            data-caption="{{ $item->caption }}"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditVideo">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                    @endif

                                                    <form action="{{ route('admin.galleries.destroy', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus media ini secara permanen?')">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-secondary"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-5">
                                                <i class="bi bi-inbox fs-2 opacity-30 d-block mb-2"></i>
                                                <span>Belum ada foto atau video galeri yang diunggah.</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">{{ $galleries->links('pagination::bootstrap-5') }}</div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 1. MODAL TAMBAH FOTO                       -->
    <!-- ========================================== -->
    <div class="modal fade" id="modalTambahFoto" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header py-3 border-bottom border-light px-4">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-image text-success me-2"></i> Tambah
                        Foto Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="image">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase">Judul Foto
                                Dokumentasi</label>
                            <input type="text" name="title" class="form-control modal-input-custom"
                                placeholder="Contoh: Kegiatan Upacara Santri" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase">Unggah File Gambar
                                (Maks 10MB)</label>
                            <input type="file" name="image_file" class="form-control modal-input-custom"
                                accept="image/*" required>
                        </div>
                        <div class="mb-0">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label small fw-bold text-secondary text-uppercase mb-0">Caption /
                                    Keterangan Teks (Opsional)</label>
                                <span class="small text-muted" style="font-size: 0.75rem;"><span
                                        id="add_foto_char_count">0</span> / 500 Karakter</span>
                            </div>
                            <textarea name="caption" id="add_foto_caption" class="form-control modal-input-custom char-count-input"
                                maxlength="500" data-counter="add_foto_char_count" rows="3" placeholder="Tuliskan keterangan foto..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-light p-3 px-4 bg-light bg-opacity-40">
                        <button type="button" class="btn btn-light px-4 py-2 rounded-3 text-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded-3 fw-medium">Upload
                            Foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 2. MODAL TAMBAH VIDEO YOUTUBE              -->
    <!-- ========================================== -->
    <div class="modal fade" id="modalTambahVideo" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header py-3 border-bottom border-light px-4">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-youtube text-danger me-2"></i> Tambah
                        Video YouTube</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.galleries.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="video">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase">Judul Video
                                Dokumentasi</label>
                            <input type="text" name="title" class="form-control modal-input-custom"
                                placeholder="Contoh: Profil Pondok Pesantren Al Hikmah" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase">Link Eksternal Video
                                (URL YouTube)</label>
                            <input type="url" name="video_link" class="form-control modal-input-custom"
                                placeholder="https://www.youtube.com/watch?v=..." required>
                        </div>
                        <div class="mb-0">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label small fw-bold text-secondary text-uppercase mb-0">Caption /
                                    Keterangan Teks (Opsional)</label>
                                <span class="small text-muted" style="font-size: 0.75rem;"><span
                                        id="add_video_char_count">0</span> / 500 Karakter</span>
                            </div>
                            <textarea name="caption" id="add_video_caption" class="form-control modal-input-custom char-count-input"
                                maxlength="500" data-counter="add_video_char_count" rows="3"
                                placeholder="Tuliskan keterangan ringkas video..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-light p-3 px-4 bg-light bg-opacity-40">
                        <button type="button" class="btn btn-light px-4 py-2 rounded-3 text-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger px-4 py-2 rounded-3 fw-medium">Simpan
                            Video</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 3. MODAL EDIT FOTO                         -->
    <!-- ========================================== -->
    <div class="modal fade" id="modalEditFoto" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header py-3 border-bottom border-light px-4">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-pencil-square text-success me-2"></i>
                        Edit Data Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEditFoto" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="image">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase">Judul Foto</label>
                            <input type="text" name="title" id="edit_foto_title"
                                class="form-control modal-input-custom" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase">Ganti Gambar
                                (Kosongkan jika tetap)</label>
                            <input type="file" name="image_file" class="form-control modal-input-custom"
                                accept="image/*">
                        </div>
                        <div class="mb-0">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label small fw-bold text-secondary text-uppercase mb-0">Caption /
                                    Keterangan Teks</label>
                                <span class="small text-muted" style="font-size: 0.75rem;"><span
                                        id="edit_foto_char_count">0</span> / 500 Karakter</span>
                            </div>
                            <textarea name="caption" id="edit_foto_caption" class="form-control modal-input-custom char-count-input"
                                maxlength="500" data-counter="edit_foto_char_count" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-light p-3 px-4 bg-light bg-opacity-40">
                        <button type="button" class="btn btn-light px-4 py-2 rounded-3 text-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded-3 fw-medium">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 4. MODAL EDIT VIDEO YOUTUBE                -->
    <!-- ========================================== -->
    <div class="modal fade" id="modalEditVideo" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header py-3 border-bottom border-light px-4">
                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-pencil-square text-danger me-2"></i>
                        Edit Data Video YouTube</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEditVideo" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="video">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase">Judul Video</label>
                            <input type="text" name="title" id="edit_video_title"
                                class="form-control modal-input-custom" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary text-uppercase">Link Eksternal Video
                                (URL YouTube)</label>
                            <input type="url" name="video_link" id="edit_video_link"
                                class="form-control modal-input-custom" required>
                        </div>
                        <div class="mb-0">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label small fw-bold text-secondary text-uppercase mb-0">Caption /
                                    Keterangan Teks</label>
                                <span class="small text-muted" style="font-size: 0.75rem;"><span
                                        id="edit_video_char_count">0</span> / 500 Karakter</span>
                            </div>
                            <textarea name="caption" id="edit_video_caption" class="form-control modal-input-custom char-count-input"
                                maxlength="500" data-counter="edit_video_char_count" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-light p-3 px-4 bg-light bg-opacity-40">
                        <button type="button" class="btn btn-light px-4 py-2 rounded-3 text-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger px-4 py-2 rounded-3 fw-medium">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger Edit Foto
            const btnEditFoto = document.querySelectorAll('.btn-edit-foto');
            btnEditFoto.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const caption = this.getAttribute('data-caption');

                    document.getElementById('edit_foto_title').value = title;
                    document.getElementById('edit_foto_caption').value = caption;
                    document.getElementById('formEditFoto').action = `/admin/galleries/${id}`;
                });
            });

            // Trigger Edit Video
            const btnEditVideo = document.querySelectorAll('.btn-edit-video');
            btnEditVideo.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const link = this.getAttribute('data-link');
                    const caption = this.getAttribute('data-caption');

                    document.getElementById('edit_video_title').value = title;
                    document.getElementById('edit_video_link').value = link;
                    document.getElementById('edit_video_caption').value = caption;
                    document.getElementById('formEditVideo').action = `/admin/galleries/${id}`;
                });
            });
        });
    </script>
</body>

</html>
