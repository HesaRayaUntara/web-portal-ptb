<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update atau buat admin baru
        // Gunakan DB::table untuk bypass mutator dan update password yang sudah di-hash dengan benar
        $admin = Admin::where('username', 'hesa')->first();
        
        if ($admin) {
            // Update password yang sudah ada (bypass mutator dengan update langsung)
            DB::table('auth')
                ->where('id', $admin->id)
                ->update([
                    'password' => Hash::make('hesaraya123'),
                    'updated_at' => now(),
                ]);
        } else {
            // Buat admin baru
            // Password akan di-hash otomatis oleh mutator di model Admin
            Admin::create([
                'username' => 'hesa',
                'password' => 'hesaraya123',
            ]);
        }
    }
}
