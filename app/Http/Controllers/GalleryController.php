<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    // Halaman Admin Galeri
    public function adminIndex()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    // Simpan Data Baru (Foto atau Video)
    public function store(Request $request)
    {
        // Pada method store() dan update():
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video',
            'image_file' => 'required_if:type,image|nullable|image|mimes:jpeg,png,jpg|max:10240',
            'video_link' => 'required_if:type,video|nullable|url',
            'caption' => 'nullable|string|max:500' // Pembatasan maksimal 500 karakter
        ], [
            'required' => 'Kolom ini wajib diisi.',
            'required_if' => 'File gambar/link video wajib diisi sesuai tipe yang dipilih.',
            'image' => 'File harus berupa gambar.',
            'mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'max' => 'Ukuran gambar maksimal adalah 10 MB.',
            'caption.max' => 'Caption/keterangan maksimal 500 karakter.',
            'url' => 'Format link URL video tidak valid.'
        ]);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'caption' => $request->caption,
        ];

        if ($request->type === 'image' && $request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = 'gallery_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $destinationPath = is_dir(base_path('../public_html'))
                ? base_path('../public_html/assets/images/gallery')
                : public_path('assets/images/gallery');

            $file->move($destinationPath, $fileName);
            $data['file_or_link'] = $fileName;
        } else {
            $data['file_or_link'] = $request->video_link;
        }

        Gallery::create($data);

        return redirect()->back()->with('success', 'Postingan galeri baru berhasil ditambahkan!');
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        // Pada method store() dan update():
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video',
            'image_file' => 'required_if:type,image|nullable|image|mimes:jpeg,png,jpg|max:10240',
            'video_link' => 'required_if:type,video|nullable|url',
            'caption' => 'nullable|string|max:500' // Pembatasan maksimal 500 karakter
        ], [
            'caption.max' => 'Caption/keterangan maksimal 500 karakter.'
        ]);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'caption' => $request->caption,
        ];

        if ($request->type === 'image') {
            if ($request->hasFile('image_file')) {
                $file = $request->file('image_file');
                $fileName = 'gallery_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $destinationPath = is_dir(base_path('../public_html'))
                    ? base_path('../public_html/assets/images/gallery')
                    : public_path('assets/images/gallery');

                $file->move($destinationPath, $fileName);

                // Hapus file lama jika sebelumnya bertipe image
                if ($gallery->type === 'image' && !empty($gallery->file_or_link)) {
                    $oldPath = $destinationPath . '/' . $gallery->file_or_link;
                    if (file_exists($oldPath))
                        @unlink($oldPath);
                }

                $data['file_or_link'] = $fileName;
            } else {
                // Jika tipe tetap image dan tidak upload baru, pakai file lama
                if ($gallery->type === 'image') {
                    $data['file_or_link'] = $gallery->file_or_link;
                }
            }
        } else {
            // Tipe Video
            $data['file_or_link'] = $request->video_link ?? $gallery->file_or_link;
        }

        $gallery->update($data);

        return redirect()->back()->with('success', 'Data galeri berhasil diperbarui!');
    }

    // Hapus Data
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->type === 'image' && !empty($gallery->file_or_link)) {
            $destinationPath = is_dir(base_path('../public_html'))
                ? base_path('../public_html/assets/images/gallery')
                : public_path('assets/images/gallery');

            $filePath = $destinationPath . '/' . $gallery->file_or_link;
            if (file_exists($filePath))
                @unlink($filePath);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Item galeri berhasil dihapus permanen!');
    }
}