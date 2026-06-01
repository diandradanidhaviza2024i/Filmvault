<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Muat Autoloader Vendor
require __DIR__.'/../vendor/autoload.php';

// 2. Bangun Aplikasi Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// --- DI SINI KUNCI UTAMA VERCEL ---
// Pindahkan storage path ke /tmp karena hanya folder ini yang bisa ditulis (Writeable) di Vercel
$app->useStoragePath('/tmp/storage');

// Buat struktur folder storage secara otomatis di /tmp jika belum ada
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs'
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}
// ----------------------------------

// 3. Jalankan Aplikasi (Mendukung Laravel 10 & 11)
if (method_exists($app, 'handleRequest')) {
    // Jalur untuk Laravel 11
    $app->handleRequest(Request::capture());
} else {
    // Jalur untuk Laravel 10
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
        $request = Request::capture()
    )->send();
    $kernel->terminate($request, $response);
}