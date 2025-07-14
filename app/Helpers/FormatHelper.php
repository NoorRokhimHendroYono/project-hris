<?php

namespace App\Helpers;

use Carbon\Carbon;

class FormatHelper
{
    public static function tanggalIndonesia($tanggal)
    {
        // Tapi logikanya agak terbalik: 
        // if ($tanggal) return '-'; // ❌ salah
        // Seharusnya: 
        // if (!$tanggal) return '-'; // ✅ jika null, baru return -
        if (!$tanggal) return '-';

        setlocale(LC_TIME,'id_ID.utf8');
        $formatTanggal = \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y');

        return $formatTanggal;
    }
}