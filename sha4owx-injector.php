<?php
$req  = isset($_GET['_f']) ? $_GET['_f'] : 'index.html';
$req  = ltrim(str_replace(array('../', '..\\', '..'), '', $req), '/');
$path = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/' . $req;

if (is_dir($path)) {
    $path = rtrim($path, '/') . '/index.html';
}

if (!file_exists($path) || !is_file($path) || !preg_match('/\\.html?$/i', $path)) {
    http_response_code(404);
    exit('Not found');
}

$html   = file_get_contents($path);
$widget = file_get_contents(dirname(__FILE__) . '/sha4owx-widget.php');
$html   = preg_replace('/<\\/body>/i', $widget . "\n</body>", $html);

header('Content-Type: text/html; charset=UTF-8');
echo $html;
