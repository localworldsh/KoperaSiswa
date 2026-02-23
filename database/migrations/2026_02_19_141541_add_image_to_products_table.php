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
        // Pastikan tabel 'products' ada sebelum dimodifikasi
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                // Tambahkan pengecekan agar tidak error jika kolom 'image' ternyata sudah ada
                if (!Schema::hasColumn('products', 'image')) {
                    $table->string('image')->nullable()->after('description');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (Schema::hasColumn('products', 'image')) {
                    $table->dropColumn('image');
                }
            });
        }
    }
};