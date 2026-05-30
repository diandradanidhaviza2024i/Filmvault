<?php

/**
 * Ini adalah file jembatan (entry point) khusus untuk Vercel.
 * Vercel Serverless Functions akan membaca folder /api
 * File ini akan meneruskan semua request Vercel ke sistem public/index.php milik Laravel.
 */

require __DIR__ . '/../public/index.php';