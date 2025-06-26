<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongans';

    protected $dates = ['created_at', 'updated_at'];

    // Tambahkan kolom yang bisa diisi massal
    protected $fillable = [
        'judul',
        'slug',
        'tanggal_buka',
        'tanggal_tutup',
        'pengalaman',
        'category_id', // ✅ WAJIB ADA
        'deskripsi',
        'requirement',
        'lokasi',
        'status',
        'link',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lowongan) {
            // BEFORE ⏪ 🔙
            // $lowongan->slug = Str::slug($lowongan->judul);

            // AFTER ⏩ 🔜
            $lowongan->slug = static::generateUniqueSlug($lowongan->judul);
        });

        static::updating(function ($lowongan) {
            // BEFORE ⏪ 🔙
            // $lowongan->slug = Str::slug($lowongan->judul);

            //AFTER ⏩ 🔜
            $lowongan->slug = static::generateUniqueSlug($lowongan->judul, $lowongan->id);
        });
    }
    
    public static function generateUniqueSlug($judul, $exceptId = null)
    {
        $slug = Str::slug($judul);
        $original = $slug;
        $count = 1;

        while (self::where('slug', $slug)->when($exceptId, fn($q) => $q->where('id', '!=', $exceptId))->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        return $slug;
    }

    protected static function booted()
    {
        static::saving(function($lowongan) {
            //kalau slug kosong, generate otomatis
            if (empty($lowongan->slug)) {
                $lowongan->slug = Str::slug($lowongan->judul);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
