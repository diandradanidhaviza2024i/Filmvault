<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Muat Autoloader
require __DIR__.'/../vendor/autoload.php';

// Bangun aplikasi Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// --- TAMBAHAN KHUSUS VERCEL ---
// Pindahkan storage ke folder /tmp (satu-satunya folder yg bisa ditulis di Vercel)
$app->useStoragePath('/tmp/storage');

// Buat struktur folder otomatis jika belum ada
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
// -----------------------------

// Jalankan aplikasi (Mendukung Laravel 10 dan 11)
if (method_exists($app, 'handleRequest')) {
    // Untuk Laravel 11
    $app->handleRequest(Request::capture());
} else {
    // Untuk Laravel 10
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
        $request = Request::capture()
    )->send();
    $kernel->terminate($request, $response);
}