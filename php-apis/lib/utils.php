<?php

function getTime() {
    $microtime = microtime(true);
    $milliseconds = sprintf("%03d", ($microtime - floor($microtime)) * 1000);
    $time = gmdate('Y-m-d\TH:i:s', $microtime);
    return $time . '.' . $milliseconds . 'Z';
}

function base64_url_decode($base64URL) {
    $base64URL_string = str_replace(['-', '_'], ['+', '/'], $base64URL);
    $padding = strlen($base64URL_string) % 4;
    $base64URL_string .= str_repeat('=', $padding);
    $result = base64_decode($base64URL_string);

    return $result;

}

function base64_url_safe_string($base64URL) {
    $base64URL = base64_encode($base64URL);
    $result = str_replace(['+', '/', '='], ['-', '_', ''], $base64URL);

    return $result;
}

function print_hex_binary($data) {
    $data = utf8_encode($data);
    $hash = hash('sha256', $data, true);
    
    return strtoupper(bin2hex($hash));
}

function get_thumbprint($cert) {
    $cert = openssl_x509_fingerprint($cert, "sha256");
    return str_replace(":", "", $cert);
}