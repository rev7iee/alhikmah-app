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
            'popup_banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:20120',
            'program_1_image' => 'nullable|image|mimes:jpeg,png,jpg|max:20120',
            'pondok_campus_image' => 'nullable|image|mimes:jpeg,png,jpg|max:20120',
        ], [
            'image' => 'File harus berupa gambar.',
            'mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'max' => 'Ukuran gambar terlalu besar, maksimal adalah 20 MB.',
        ]);
        $inputs = $request->except('_token');

        foreach ($inputs as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $fileName = $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images'), $fileName);
                $value = $fileName;
                $oldSetting = Setting::where('key', $key)->first();
                if ($oldSetting && $oldSetting->value) {
                    $oldFilePath = public_path('assets/images/' . $oldSetting->value);
                    if (file_exists($oldFilePath)) {
                        @unlink($oldFilePath);
                    }
                }
            }
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
            if (!empty($setting->value)) {
                $filePath = public_path('assets/images/' . $setting->value);
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