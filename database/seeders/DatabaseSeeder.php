<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User di-import
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun admin default jika belum ada
        User::updateOrCreate(
            ['email' => 'admin@alhikmah.com'], // Email untuk login
            [
                'name' => 'Super Admin Al Hikmah',
                'password' => Hash::make('password123'), // Password default (ganti yang aman)
                'role' => 'admin' // sesuaikan dengan kolom role milikmu jika ada
            ]
        );
    }
}
