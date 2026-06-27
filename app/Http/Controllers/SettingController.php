<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
// use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // 1. Menampilkan Halaman Form Pengaturan di Admin
    public function index()
    {
        // Ambil semua data dari tabel settings, lalu ubah menjadi bentuk key-value agar mudah dipanggil di Blade
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings', compact('settings'));
    }

    // 2. Memproses Penyimpanan Data Form (Update atau Create Otomatis)
    public function save(Request $request)
    {
        // 1. TAMBAHKAN VALIDASI DI SINI SEBELUM PROSES LAINNYA
        $request->validate([
            'popup_banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:20120', // Maksimal 5MB (5120 KB)
            'program_1_image' => 'nullable|image|mimes:jpeg,png,jpg|max:20120', // Sesuaikan dengan name input lain jika ada
            'pondok_campus_image' => 'nullable|image|mimes:jpeg,png,jpg|max:20120',
        ], [
            // Opsional: Kostumisasi pesan error bahasa Indonesia agar ramah pengguna
            'image' => 'File harus berupa gambar.',
            'mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'max' => 'Ukuran gambar terlalu besar, maksimal adalah 20 MB.',
        ]);

        // Ambil semua inputan dari form kecuali token CSRF
        $inputs = $request->except('_token');

        foreach ($inputs as $key => $value) {

            // Logika Khusus jika inputan berupa FILE GAMBAR
            if ($request->hasFile($key)) {
                $file = $request->file($key);

                // Beri nama unik pada file gambar
                $fileName = $key . '_' . time() . '.' . $file->getClientOriginalExtension();

                // Simpan file ke dalam folder: public/assets/images/
                $file->move(public_path('assets/images'), $fileName);

                // Nilai yang disimpan ke database adalah NAMA FILE-nya saja
                $value = $fileName;

                // OPSI TAMBAHAN: Hapus file gambar lama di folder jika admin mengganti gambarnya
                $oldSetting = Setting::where('key', $key)->first();
                if ($oldSetting && $oldSetting->value) {
                    $oldFilePath = public_path('assets/images/' . $oldSetting->value);
                    if (file_exists($oldFilePath)) {
                        @unlink($oldFilePath);
                    }
                }
            }

            // Eksekusi fungsi Sakti: Jika KEY belum ada maka buat baru (CREATE), jika sudah ada maka timpa (UPDATE)
            Setting::updateOrCreate(
                ['key' => $key],   // Dicari berdasarkan ini
                ['value' => $value] // Data yang dimasukkan/diubah
            );
        }

        // Kembali ke halaman form dengan pesan sukses
        return redirect()->back()->with('success', 'Pengaturan website berhasil disimpan langsung dari Panel Admin!');
    }
    // 3. Fitur Baru: Menghapus File Pop-up Banner Pengumuman
    public function deleteBanner()
    {

        // Gunakan pencarian LIKE untuk menghindari bug spasi tak terlihat di database
        $setting = Setting::where('key', 'LIKE', '%popup_banner_image%')->first();

        if ($setting) {
            // 1. Hapus file fisiknya jika ada
            if (!empty($setting->value)) {
                $filePath = public_path('assets/images/' . $setting->value);
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }
            }

            // 2. Gunakan query mentah langsung ke database untuk mengosongkannya demi menembus lock
            \DB::table('settings')
                ->where('id', $setting->id)
                ->update(['value' => '']);

            return redirect()->back()->with('success', 'Banner pengumuman berhasil dihapus dan dinonaktifkan!');
        }

        return redirect()->back()->with('error', 'Tidak ada banner aktif yang bisa dihapus.');
    }
}