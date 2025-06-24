<?php

namespace app\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facedes\Log;
use App\Models\Lowongan;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // \App\Models\Lowongan::where('status', 'aktif')
            $updated = Lowongan::where('status', 'aktif')
                ->whereDate('tanggal_tutup', '<', now())
                ->update(['status' => 'non-aktif']);

            if ($updated > 0) {
                Log::info("✅ [$updated] lowongan otomatis dinonaktifkan karena tanggal tutup sudah lewat.");
            } else {
                Log::info("ℹ️ Tidak ada lowongan yang perlu diupdate hari ini.");
            }
        })->everyMinute(); // Bisa diganti "hourly()" kalau butuh lebih cepat, normalnya "daily()", pengen lebih cepet "everyMinute()"
    }

        protected function commands(): void
    {
        $this->load(__DIR__ .'/Commands');
        require base_path('routes/console.php');
    }

}