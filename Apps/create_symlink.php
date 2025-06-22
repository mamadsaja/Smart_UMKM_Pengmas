<?php

/**
 * Script untuk membuat symbolic link di hosting
 * Jalankan script ini melalui browser atau command line
 */

// Pastikan script dijalankan dari root Laravel
$laravelRoot = __DIR__;

// Path untuk storage dan public
$storagePath = $laravelRoot . '/storage/app/public';
$publicPath = $laravelRoot . '/public/storage';

echo "=== Script Pembuatan Symbolic Link ===\n";
echo "Laravel Root: " . $laravelRoot . "\n";
echo "Storage Path: " . $storagePath . "\n";
echo "Public Path: " . $publicPath . "\n\n";

// Cek apakah direktori storage ada
if (!is_dir($storagePath)) {
    echo "❌ Error: Direktori storage tidak ditemukan: " . $storagePath . "\n";
    exit(1);
}

// Cek apakah direktori public ada
if (!is_dir($laravelRoot . '/public')) {
    echo "❌ Error: Direktori public tidak ditemukan\n";
    exit(1);
}

// Hapus symlink yang sudah ada (jika ada)
if (is_link($publicPath)) {
    if (unlink($publicPath)) {
        echo "✅ Symlink lama berhasil dihapus\n";
    } else {
        echo "❌ Gagal menghapus symlink lama\n";
    }
}

// Buat symlink baru
if (symlink($storagePath, $publicPath)) {
    echo "✅ Symbolic link berhasil dibuat!\n";
    echo "Storage -> " . $storagePath . "\n";
    echo "Public  -> " . $publicPath . "\n\n";
    
    // Test akses
    if (is_link($publicPath)) {
        echo "✅ Verifikasi: Symlink berfungsi dengan baik\n";
    } else {
        echo "❌ Verifikasi: Symlink tidak berfungsi\n";
    }
} else {
    echo "❌ Gagal membuat symbolic link\n";
    echo "Kemungkinan penyebab:\n";
    echo "1. Permission tidak cukup\n";
    echo "2. Hosting tidak mendukung symlink\n";
    echo "3. Path tidak valid\n\n";
    
    echo "Alternatif untuk hosting yang tidak mendukung symlink:\n";
    echo "1. Gunakan .htaccess rewrite rules\n";
    echo "2. Upload file langsung ke public folder\n";
    echo "3. Gunakan CDN atau cloud storage\n";
}

echo "\n=== Selesai ===\n";
?> 