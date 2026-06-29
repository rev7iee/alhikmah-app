<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $categoryFilter = $request->query('category');
        $query = Post::latest();
        if ($categoryFilter && $categoryFilter !== '') {
            $query->where('category', $categoryFilter);
        }
        $posts = $query->paginate(5)->withQueryString();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:News,Education,Events,Informatic',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:12288',
            'bg_detail' => 'required|image|mimes:jpeg,png,jpg|max:12288',
            'extra_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:12288',
            'extra_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:12288',
            'hashtags' => 'nullable|string'
        ], [
            'required' => 'Kolom ini wajib diisi.',
            'image' => 'File harus berupa gambar.',
            'mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'max' => 'Ukuran gambar terlalu besar, maksimal adalah 12 MB.',
        ]);
        $data = $request->all();
        $images = ['thumbnail', 'bg_detail', 'extra_image_1', 'extra_image_2'];

        foreach ($images as $imgKey) {
            if ($request->hasFile($imgKey)) {
                $file = $request->file($imgKey);
                $fileName = 'news_' . $imgKey . '_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $destinationPath = is_dir(base_path('../public_html'))
                    ? base_path('../public_html/assets/images/news')
                    : public_path('assets/images/news');

                $file->move($destinationPath, $fileName);
                $data[$imgKey] = $fileName;
            }
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita baru berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:News,Education,Events,Informatic',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:12288',
            'bg_detail' => 'nullable|image|mimes:jpeg,png,jpg|max:12288',
            'extra_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:12288',
            'extra_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:12288',
            'hashtags' => 'nullable|string'
        ], [
            'required' => 'Kolom ini wajib diisi.',
            'image' => 'File harus berupa gambar.',
            'mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'max' => 'Ukuran gambar terlalu besar, maksimal adalah 12 MB.',
        ]);

        $data = $request->all();
        $images = ['thumbnail', 'bg_detail', 'extra_image_1', 'extra_image_2'];

        foreach ($images as $imgKey) {
            if ($request->hasFile($imgKey)) {
                $file = $request->file($imgKey);
                $fileName = 'news_' . $imgKey . '_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $destinationPath = is_dir(base_path('../public_html'))
                    ? base_path('../public_html/assets/images/news')
                    : public_path('assets/images/news');

                $file->move($destinationPath, $fileName);

                if (!empty($post->$imgKey)) {
                    $oldPath = public_path('assets/images/news/' . $post->$imgKey);
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }

                $data[$imgKey] = $fileName;
            } else {
                $data[$imgKey] = $post->$imgKey;
            }
        }
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $images = ['thumbnail', 'bg_detail', 'extra_image_1', 'extra_image_2'];
        foreach ($images as $imgKey) {
            if (!empty($post->$imgKey)) {
                $filePath = public_path('assets/images/news/' . $post->$imgKey);
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }
            }
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita beserta seluruh aset gambar berhasil dihapus permanen!');
    }
}