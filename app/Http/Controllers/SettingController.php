<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
// use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings', compact('settings'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'popup_banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'program_1_image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'pondok_campus_image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ], [
            'image' => 'File harus berupa gambar.',
            'mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'max' => 'Ukuran gambar terlalu besar, maksimal adalah 10 MB.',
        ]);
        $inputs = $request->except('_token');

        foreach ($inputs as $key => $value) {

            // Logika Khusus jika inputan berupa FILE GAMBAR
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                // Beri nama unik pada file gambar
                $fileName = $key . '_' . time() . '.' . $file->getClientOriginalExtension();

                // Logika otomatis: jika di hosting pakai public_html, jika di lokal pakai path normal Laragon
                $destinationPath = is_dir(base_path('../public_html'))
                    ? base_path('../public_html/assets/images')
                    : public_path('assets/images');

                // Pindahkan file ke folder tujuan yang sudah presisi
                $file->move($destinationPath, $fileName);
                $value = $fileName;

                // OPSI TAMBAHAN: Hapus file gambar lama di folder jika admin mengganti gambarnya
                $oldSetting = Setting::where('key', $key)->first();
                if ($oldSetting && $oldSetting->value) {
                    $oldFilePath = $destinationPath . '/' . $oldSetting->value;
                    if (file_exists($oldFilePath)) {
                        @unlink($oldFilePath);
                    }
                }
            }

            // Eksekusi fungsi Sakti: Jika KEY belum ada maka buat baru (CREATE), jika sudah ada maka timpa (UPDATE)
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Pengaturan website berhasil disimpan langsung dari Panel Admin!');
    }
    public function deleteBanner()
    {
        $setting = Setting::where('key', 'LIKE', '%popup_banner_image%')->first();

        if ($setting) {
            // 1. Hapus file fisiknya jika ada menggunakan jalur dinamis
            if (!empty($setting->value)) {
                $destinationPath = is_dir(base_path('../public_html'))
                    ? base_path('../public_html/assets/images')
                    : public_path('assets/images');

                $filePath = $destinationPath . '/' . $setting->value;
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }
            }
            \DB::table('settings')
                ->where('id', $setting->id)
                ->update(['value' => '']);

            return redirect()->back()->with('success', 'Banner pengumuman berhasil dihapus dan dinonaktifkan!');
        }

        return redirect()->back()->with('error', 'Tidak ada banner aktif yang bisa dihapus.');
    }
}