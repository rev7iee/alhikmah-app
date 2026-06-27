<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Setting;

/*
|--------------------------------------------------------------------------
| 1. JALUR PUBLIK (PUBLIC ROUTES)
|--------------------------------------------------------------------------
*/
// KODE BARU UNTUK HALAMAN BERANDA PUBLIK
Route::get('/', function () {
    // 1. Ambil 3 berita terbaru untuk section Kabar Terkini
    $recentPosts = Post::latest()->take(3)->get();

    // 2. Ambil semua data pengaturan website (Banner, Kontak, Program, dll)
    $settings = Setting::pluck('value', 'key')->toArray();

    // 3. Kirim data tersebut ke file welcome.blade.php
    return view('index', compact('recentPosts', 'settings'));
});

// KODE BARU UNTUK HALAMAN PROFIL PUBLIK
Route::get('/profil', function () {
    // 2. Ambil semua data pengaturan website (Banner, Kontak, Program, dll)
    $settings = Setting::pluck('value', 'key')->toArray();

    // 3. Kirim data tersebut ke file welcome.blade.php
    return view('profil', compact('settings'));
});

Route::get('/blog', function (Request $request) {
    // 1. Ambil data running text pengumuman bar atas
    $settings = Setting::pluck('value', 'key')->toArray();

    // 2. Ambil 1 berita paling terbaru/terakhir kali di-update untuk Featured Post
    $featuredPost = Post::latest('updated_at')->first();

    // 3. Bangun Query adaptif untuk ALL POSTS GRID (Kecuali berita yang masuk Featured)
    $query = Post::query();

    if ($featuredPost) {
        $query->where('id', '!=', $featuredPost->id);
    }

    // FILTER KATEGORI: Jika user memilih kategori tertentu
    if ($request->has('category') && $request->category != '') {
        $query->where('category', $request->category);
    }

    // FILTER SORTIR (URUTAN): Urutan terbaru (default) atau terlama
    if ($request->sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    } else {
        $query->orderBy('created_at', 'desc'); // Terbaru upload
    }

    // 4. Eksekusi Pagination mengunci jumlah maksimal 6 berita per halaman
    // appends() berfungsi menjaga agar filter tidak hilang saat user klik tombol halaman berikutnya
    $allPosts = $query->paginate(6)->appends($request->all());

    // 5. Ambil daftar kategori unik dari database untuk mengisi pilihan drop-down filter
    $categories = Post::distinct()->pluck('category')->toArray();

    return view('blog', compact('settings', 'featuredPost', 'allPosts', 'categories'));
});

// RUTE UNTUK HALAMAN DETAIL BERITA BERDASARKAN ID
Route::get('/blog/detail/{id}', function ($id) {
    // 1. Ambil data running text pengumuman bar atas
    $settings = Setting::pluck('value', 'key')->toArray();

    // 2. Ambil data berita utama berdasarkan ID, jika tidak ada kirim error 404
    $post = Post::findOrFail($id);

    // 3. Ambil 3 Berita Lain Secara Acak (Related Posts) - Kecuali berita yang sedang dibaca saat ini
    $relatedPosts = Post::where('id', '!=', $id)
        ->inRandomOrder()
        ->take(3)
        ->get();

    return view('blog-detail', compact('settings', 'post', 'relatedPosts'));
});

// RUTE UNTUK HALAMAN KONTAK LEMBAGA
Route::get('/kontak', function () {
    // Menarik seluruh data pengaturan dari database
    $settings = Setting::pluck('value', 'key')->toArray();

    return view('kontak', compact('settings'));
});

/*
|--------------------------------------------------------------------------
| 2. JALUR GUEST (Hanya Bisa Diakses Sebelum Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/admin-login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin-login', [AuthController::class, 'login']);
});


/*
|--------------------------------------------------------------------------
| 3. JALUR PROTEKSI ADMIN (Hanya Bisa Diakses Setelah Login / Auth)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // --- PROSES LOGOUT ---
    Route::post('/admin-logout', [AuthController::class, 'logout'])->name('logout');

    // --- DASHBOARD UTAMA (Dengan Data Statistik Riil) ---
    Route::get('/admin/dashboard', function () {
        // Hitung total seluruh berita
        $totalPosts = Post::count();

        // DINAMIS: Hitung berapa berita yang di-upload khusus pada bulan ini
        $postsThisMonth = Post::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->count();

        // Ambil 5 berita terakhir yang baru di-upload
        $recentPosts = Post::latest()->take(5)->get();

        // Ambil data pengaturan untuk cek status banner dan info kontak
        $settings = Setting::pluck('value', 'key')->toArray();
        $isBannerActive = !empty($settings['popup_banner_image']) ? 'Aktif' : 'Nonaktif';

        // Tambahkan variabel postsThisMonth agar terkirim ke Blade
        return view('admin.dashboard', compact('totalPosts', 'postsThisMonth', 'recentPosts', 'settings', 'isBannerActive'));
    })->name('admin.dashboard');

    // --- MANAJEMEN PENGATURAN WEBSITE ---
    Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/admin/settings', [SettingController::class, 'save'])->name('admin.settings.save');
    Route::post('/admin/settings/delete-banner', [SettingController::class, 'deleteBanner'])->name('admin.settings.delete-banner');

    // --- CRUD BERITA & ARTIKEL (Menggunakan Sistem Modal) ---
    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::post('/admin/posts/{id}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::post('/admin/posts/{id}/delete', [PostController::class, 'destroy'])->name('admin.posts.destroy');

    /* | Catatan Tambahan:
    | Rute '/admin/posts/create' dan '/admin/posts/{id}/edit' sengaja dihapus 
    | dari rute karena kita sudah sukses menggunakan sistem satu halaman dengan Modal Pop-up.
    */
});

Route::get('/init-admin-rahasia', function () {
    try {
        \Artisan::call('db:seed', ['--force' => true]);
        return "Akun Admin Berhasil Dibuat!";
    } catch (\Exception $e) {
        return "Gagal: " . $e->getMessage();
    }
});

Route::get('/clear-cache', function () {
    try {
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
        \Artisan::call('config:clear');
        \Artisan::call('cache:clear');
        return "Semua cache di Hostinger berhasil dibersihkan total!";
    } catch (\Exception $e) {
        return "Gagal membersihkan: " . $e->getMessage();
    }
});