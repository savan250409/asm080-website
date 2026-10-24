<?php

/*
 * Export the landing page as a static site for Firebase Hosting.
 *
 * Renders the "/" route through Laravel into dist/index.html and copies the
 * public assets (Vite build, images, videos, favicon) next to it.
 * Run `npm run build` first so public/build is current.
 *
 * Usage: php scripts/export-static.php
 *   (no local PHP? `npx @php-wasm/cli scripts/export-static.php`)
 */

$root = dirname(__DIR__);
$dist = $root.'/dist';

if (file_exists($root.'/public/hot')) {
    fwrite(STDERR, "public/hot exists (Vite dev server running) - stop it and run `npm run build` first.\n");
    exit(1);
}

require $root.'/vendor/autoload.php';
$app = require $root.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/', 'GET');
$response = $kernel->handle($request);
if ($response->getStatusCode() !== 200) {
    fwrite(STDERR, 'Render failed with HTTP '.$response->getStatusCode()."\n");
    exit(1);
}

// asset() renders absolute URLs from the request host; make them root-relative.
$html = str_replace($request->root().'/', '/', $response->getContent());

$rrmdir = function (string $dir) use (&$rrmdir) {
    if (! is_dir($dir)) {
        return;
    }
    foreach (array_diff(scandir($dir), ['.', '..']) as $item) {
        $path = $dir.'/'.$item;
        is_dir($path) ? $rrmdir($path) : unlink($path);
    }
    rmdir($dir);
};
$copy = function (string $from, string $to) use (&$copy) {
    if (is_dir($from)) {
        @mkdir($to, 0777, true);
        foreach (array_diff(scandir($from), ['.', '..']) as $item) {
            $copy($from.'/'.$item, $to.'/'.$item);
        }
    } else {
        copy($from, $to);
    }
};

$rrmdir($dist);
mkdir($dist, 0777, true);
file_put_contents($dist.'/index.html', $html);

// Everything in public/ except the PHP front controller and dev/preview files.
$skip = ['.', '..', 'index.php', '.htaccess', 'hot', '__preview.html'];
foreach (array_diff(scandir($root.'/public'), $skip) as $item) {
    $copy($root.'/public/'.$item, $dist.'/'.$item);
}

echo 'Exported static site to dist/ ('.strlen($html)." bytes of HTML)\n";
