<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lowongan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed 10 dummy lowongan
        // for ($i = 1; $i <= 10; $i++) {
        //     Lowongan::create([
        //         'judul'         =>  "Lowongan Ke-$i",
        //         'slug'          =>  Str::slug("Lowongan Ke-$i"),
        //         'tanggal_buka'  =>  now(),
        //         'tanggal_tutup' =>  now()->addDays(30),
        //         'pengalaman'    =>  'fresh_graduate',
        //         'kategori'      =>  'IT',
        //         'deskripsi'     => '<p>Deskripsi pekerjaan ke-'.$i.'</p>',
        //         'requirement'   => '<ul><li>Requirement 1</li><li>Requirement 2</li></ul>',
        //         'lokasi'        => 'Kudus',
        //         'status'        => 'aktif',
        //     ]);
        // }
        DB::table('lowongans')->insert([
            [
                'judul' => 'Lowongan Ke -1',
                'slug' => 'lowongan-ke-1',
                'tanggal_buka' => now(),
                'tanggal_tutup' => now()->addDays(30),
                'pengalaman' => 'fresh_graduate',
                'deskripsi' => '<p>Deskripsi pekerjaan ke-1</p>',
                'requirement' => '<ul><li>Requirement 1</li><li>Requirement 2</li></ul>',
                'lokasi' => 'Kudus',
                'status' => 'aktif',
                'category_id' => 1, // ✅ sesuaikan id-nya
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
