<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // 1. DAFTAR BERITA: Menampilkan semua berita di halaman admin
    public function index(Request $request)
    {
        // 1. Ambil kata kunci kategori dari dropdown filter di HTML (jika ada)
        $categoryFilter = $request->query('category');

        // 2. Siapkan query dasar: ambil postingan, urutkan dari yang terbaru
        $query = Post::latest();

        // 3. Jika admin memilih kategori tertentu (bukan semua), filter datanya
        if ($categoryFilter && $categoryFilter !== '') {
            $query->where('category', $categoryFilter);
        }

        // 4. Batasi hanya 5 data per halaman & jaga agar filter tidak hilang saat ganti halaman
        $posts = $query->paginate(5)->withQueryString();

        // 5. Kirim data ke halaman blade
        return view('admin.posts.index', compact('posts'));
    }

    // 2. FORM TAMBAH: Menampilkan halaman form tambah berita
    public function create()
    {
        return view('admin.posts.create');
    }

    // 3. PROSES SIMPAN: Menyimpan berita baru ke database
    public function store(Request $request)
    {
        // Validasi input data (Thumbnail dan BG Detail wajib diisi, Extra Image opsional)
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:News,Education,Events,Informatic',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2000048',
            'bg_detail' => 'required|image|mimes:jpeg,png,jpg|max:2000048',
            'extra_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2000048',
            'extra_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2000048',
            'hashtags' => 'nullable|string'
        ]);

        $data = $request->all();

        // Array untuk memetakan file gambar yang akan di-upload
        $images = ['thumbnail', 'bg_detail', 'extra_image_1', 'extra_image_2'];

        foreach ($images as $imgKey) {
            if ($request->hasFile($imgKey)) {
                $file = $request->file($imgKey);
                // Nama file unik: news_thumbnail_171758234.jpg
                $fileName = 'news_' . $imgKey . '_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                // Pindahkan ke folder public/assets/images/news
                $file->move(public_path('assets/images/news'), $fileName);
                $data[$imgKey] = $fileName;
            }
        }

        // Simpan data ke database (Slug akan terbuat otomatis melalui boot model)
        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita baru berhasil diterbitkan!');
    }

    // 4. FORM EDIT: Menampilkan halaman form edit berita berdasarkan id
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    // 5. PROSES UPDATE: Memperbarui data berita di database
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:News,Education,Events,Informatic',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2000048',
            'bg_detail' => 'nullable|image|mimes:jpeg,png,jpg|max:2000048',
            'extra_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2000048',
            'extra_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2000048',
            'hashtags' => 'nullable|string'
        ]);

        $data = $request->all();

        // Proses update gambar (jika admin mengupload gambar baru)
        $images = ['thumbnail', 'bg_detail', 'extra_image_1', 'extra_image_2'];

        foreach ($images as $imgKey) {
            if ($request->hasFile($imgKey)) {
                $file = $request->file($imgKey);
                $fileName = 'news_' . $imgKey . '_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/news'), $fileName);

                // Hapus file gambar lama dari folder agar hemat storage
                if (!empty($post->$imgKey)) {
                    $oldPath = public_path('assets/images/news/' . $post->$imgKey);
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }

                $data[$imgKey] = $fileName;
            } else {
                // Jika tidak upload gambar baru, tetap gunakan nama gambar lama
                $data[$imgKey] = $post->$imgKey;
            }
        }

        // Update data di database
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // 6. PROSES HAPUS: Menghapus berita beserta seluruh file gambarnya
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Hapus semua file gambar fisik terkait berita ini dari folder lokal
        $images = ['thumbnail', 'bg_detail', 'extra_image_1', 'extra_image_2'];
        foreach ($images as $imgKey) {
            if (!empty($post->$imgKey)) {
                $filePath = public_path('assets/images/news/' . $post->$imgKey);
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }
            }
        }

        // Hapus baris data dari database
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita beserta seluruh aset gambar berhasil dihapus permanen!');
    }
}