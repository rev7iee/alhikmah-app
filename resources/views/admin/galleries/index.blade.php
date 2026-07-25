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
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-slate);
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

        .btn-add-gallery {
            background-color: var(--dark-green);
            color: #ffffff;
            border-radius: 10px;
            font-weight: 500;
            padding: 10px 20px;
        }

        .table-premium th {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #64748b;
            background-color: #f8fafc;
            padding: 14px 16px;
        }

        .table-premium td {
            padding: 16px;
            font-size: 0.88rem;
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
                        <span class="text-white-50 small text-uppercase">Pondok Pesantren</span>
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
                            <a class="nav-link active" href="{{ route('admin.galleries.index') }}"><i
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
                        <span class="text-success fw-medium small d-block">Gallery Control</span>
                        <small class="text-muted">Kelola koleksi foto dan video dokumentasi kegiatan pondok.</small>
                    </div>
                </nav>

                <main class="p-4 flex-grow-1">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold text-dark mb-0">Postingan Galeri</h3>
                        <button type="button" class="btn btn-add-gallery d-flex align-items-center gap-2"
                            data-bs-toggle="modal" data-bs-target="#modalTambahGaleri">
                            <i class="bi bi-plus-lg"></i> <span>Tambah Galeri / Video</span>
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4"><i
                                class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
                    @endif

                    <div class="main-card">
                        <div class="table-responsive">
                            <table class="table table-premium align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Media</th>
                                        <th>Judul Dokumentasi</th>
                                        <th>Tipe</th>
                                        <th>Caption</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($galleries as $index => $item)
                                        <tr>
                                            <td>#{{ $galleries->firstItem() + $index }}</td>
                                            <td>
                                                @if ($item->type === 'image')
                                                    <img src="{{ asset('assets/images/gallery/' . $item->file_or_link) }}"
                                                        class="rounded shadow-sm"
                                                        style="width:60px; height:40px; object-fit:cover;">
                                                @else
                                                    <span class="badge bg-danger"><i class="bi bi-youtube me-1"></i>
                                                        YouTube Video</span>
                                                @endif
                                            </td>
                                            <td class="fw-semibold text-dark">{{ $item->title }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->type === 'image' ? 'bg-success' : 'bg-primary' }} text-uppercase">{{ $item->type }}</span>
                                            </td>
                                            <td class="text-muted small">{{ Str::limit($item->caption, 40) ?? '-' }}
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-success btn-edit"
                                                        data-id="{{ $item->id }}" data-title="{{ $item->title }}"
                                                        data-type="{{ $item->type }}"
                                                        data-file="{{ $item->file_or_link }}"
                                                        data-caption="{{ $item->caption }}" data-bs-toggle="modal"
                                                        data-bs-target="#modalEditGaleri">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <form action="{{ route('admin.galleries.destroy', $item->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin hapus media ini?')">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">Belum ada foto/video
                                                terdata.</td>
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

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="modalTambahGaleri" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Galeri / Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Judul Dokumentasi</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Tipe Media</label>
                            <select name="type" id="type_select_add" class="form-select" required>
                                <option value="image">Foto (Gambar)</option>
                                <option value="video">Video (Link YouTube)</option>
                            </select>
                        </div>
                        <div class="mb-3" id="input_image_wrap">
                            <label class="form-label small fw-bold">Unggah Gambar (Maks 10MB)</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3 d-none" id="input_video_wrap">
                            <label class="form-label small fw-bold">Link URL YouTube</label>
                            <input type="url" name="video_link" class="form-control"
                                placeholder="https://www.youtube.com/watch?v=...">
                        </div>
                        <div class="mb-0">
                            <label class="form-label small fw-bold">Caption / Keterangan (Opsional)</label>
                            <textarea name="caption" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success px-4">Simpan Media</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal fade" id="modalEditGaleri" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Media Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEditGaleri" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Judul Dokumentasi</label>
                            <input type="text" name="title" id="edit_title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Tipe Media</label>
                            <select name="type" id="edit_type" class="form-select" required>
                                <option value="image">Foto (Gambar)</option>
                                <option value="video">Video (Link YouTube)</option>
                            </select>
                        </div>
                        <div class="mb-3" id="edit_image_wrap">
                            <label class="form-label small fw-bold">Ganti Gambar (Kosongkan jika tetap)</label>
                            <input type="file" name="image_file" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-3 d-none" id="edit_video_wrap">
                            <label class="form-label small fw-bold">Link URL YouTube</label>
                            <input type="url" name="video_link" id="edit_video_link" class="form-control">
                        </div>
                        <div class="mb-0">
                            <label class="form-label small fw-bold">Caption / Keterangan</label>
                            <textarea name="caption" id="edit_caption" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success px-4">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle form tambah
            const typeAdd = document.getElementById('type_select_add');
            typeAdd.addEventListener('change', function() {
                if (this.value === 'image') {
                    document.getElementById('input_image_wrap').classList.remove('d-none');
                    document.getElementById('input_video_wrap').classList.add('d-none');
                } else {
                    document.getElementById('input_image_wrap').classList.add('d-none');
                    document.getElementById('input_video_wrap').classList.remove('d-none');
                }
            });

            // Toggle form edit & set data
            const editButtons = document.querySelectorAll('.btn-edit');
            editButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const title = this.dataset.title;
                    const type = this.dataset.type;
                    const file = this.dataset.file;
                    const caption = this.dataset.caption;

                    document.getElementById('edit_title').value = title;
                    document.getElementById('edit_type').value = type;
                    document.getElementById('edit_caption').value = caption;
                    document.getElementById('formEditGaleri').action = `/admin/galleries/${id}`;

                    if (type === 'image') {
                        document.getElementById('edit_image_wrap').classList.remove('d-none');
                        document.getElementById('edit_video_wrap').classList.add('d-none');
                    } else {
                        document.getElementById('edit_image_wrap').classList.add('d-none');
                        document.getElementById('edit_video_wrap').classList.remove('d-none');
                        document.getElementById('edit_video_link').value = file;
                    }
                });
            });
        });
    </script>
</body>

</html>
