<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            // Cek dulu, kalau belum ada baru ditambahkan
            if (!Schema::hasColumn('lowongans','slug')) {
                $table->string('slug')->nullable()->after('judul');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
