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
            $table->date('tanggal_buka')->nullable()->after('judul');
            $table->date('tanggal_tutup')->nullable()->after('tanggal_buka');
            $table->string('pengalaman'); //$table->enum('pengalaman', ['fresh_graduate', 'experienced'])->nullable()->after('tanggal_tutup');
            $table->string('kategori')->nullable()->after('pengalaman');
            $table->text('requirement')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->dropColumn(['tanggal_buka', 'tanggal_tutup', 'pengalaman', 'kategori', 'requirement']);
        });
    }
};
