<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// --- TAMBAHAN BARU: Alihkan semua file cache bawaan Laravel ke /tmp ---
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
// ----------------------------------------------------------------------

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// Pindahkan storage ke /tmp
$app->useStoragePath('/tmp/storage');

// Buat struktur folder otomatis
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

if (method_exists($app, 'handleRequest')) {
    $app->handleRequest(Request::capture());
} else {
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
        $request = Request::capture()
    )->send();
    $kernel->terminate($request, $response);
}