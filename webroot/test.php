<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

echo json_encode([
    'status' => 'success',
    'message' => 'Servidor PHP está funcionando!',
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => PHP_VERSION
]); 