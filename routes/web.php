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
| 1. JALUR PUBLIK
|--------------------------------------------------------------------------
*/
// HALAMAN BERANDA PUBLIK
Route::get('/', function () {
    $recentPosts = Post::latest()->take(3)->get();
    $settings = Setting::pluck('value', 'key')->toArray();
    return view('index', compact('recentPosts', 'settings'));
});

//  HALAMAN PROFIL PUBLIK
Route::get('/profil', function () {
    $settings = Setting::pluck('value', 'key')->toArray();

    return view('profil', compact('settings'));
});

Route::get('/blog', function (Request $request) {

    $settings = Setting::pluck('value', 'key')->toArray();
    $featuredPost = Post::latest('updated_at')->first();
    $query = Post::query();

    if ($featuredPost) {
        $query->where('id', '!=', $featuredPost->id);
    }

    if ($request->has('category') && $request->category != '') {
        $query->where('category', $request->category);
    }
    if ($request->sort === 'oldest') {
        $query->orderBy('created_at', 'asc');
    } else {
        $query->orderBy('created_at', 'desc');
    }

    $allPosts = $query->paginate(6)->appends($request->all());
    $categories = Post::distinct()->pluck('category')->toArray();

    return view('blog', compact('settings', 'featuredPost', 'allPosts', 'categories'));
});

// HALAMAN DETAIL BERITA
Route::get('/blog/detail/{id}', function ($id) {

    $settings = Setting::pluck('value', 'key')->toArray();
    $post = Post::findOrFail($id);
    $relatedPosts = Post::where('id', '!=', $id)
        ->inRandomOrder()
        ->take(3)
        ->get();

    return view('blog-detail', compact('settings', 'post', 'relatedPosts'));
});

// RUTE HALAMAN KONTAK
Route::get('/kontak', function () {
    $settings = Setting::pluck('value', 'key')->toArray();

    return view('kontak', compact('settings'));
});

/*
|--------------------------------------------------------------------------
| 2. GUEST
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/admin-login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin-login', [AuthController::class, 'login']);
});


/*
|--------------------------------------------------------------------------
| 3. PROTEKSI ADMIN 
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // --- PROSES LOGOUT ---
    Route::post('/admin-logout', [AuthController::class, 'logout'])->name('logout');

    // --- DASHBOARD UTAMA ---
    Route::get('/admin/dashboard', function () {

        $totalPosts = Post::count();

        $postsThisMonth = Post::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->count();

        $recentPosts = Post::latest()->take(5)->get();
        $settings = Setting::pluck('value', 'key')->toArray();
        $isBannerActive = !empty($settings['popup_banner_image']) ? 'Aktif' : 'Nonaktif';

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