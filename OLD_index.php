<?php

$request_path = $_SERVER['REQUEST_URI'];

$_SERVER['DOCUMENT_ROOT'] = __DIR__ . '/client';

if (is_file(__DIR__ . $request_path)) {
  return false;
}

if ($request_path == '/') {
  require __DIR__ . '/client/home.php';

} elseif ($request_path == '/config') {
  require __DIR__ . '/config.php';
}
