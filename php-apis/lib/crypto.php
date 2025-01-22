<?php

use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Random;

function symmetric_encrypt($message, $key) {
    $nonce = Random::string(16);
    
    $aes = new AES('gcm');
    $aes->setNonce($nonce);
    $aes->setKey($key);
    
    $ciphertext = $aes->encrypt($message);
    $tag = $aes->getTag();

    return $ciphertext . $tag . $nonce;
}

function symmetric_decrypt($encrypted_data, $key) {
    $block_size = 16;
    $tag_size = 16;

    $nonce = substr($encrypted_data, -$block_size);
    $tag = substr($encrypted_data, -($block_size + $tag_size), $tag_size);
    $encrypted_kyc_data = substr($encrypted_data, 0, -($block_size + $tag_size));

    $aes = new AES('gcm');

    $aes->setKey($key);
    $aes->setNonce($nonce);
    $aes->setTag($tag);

    $decrypted_data = $aes->decrypt($encrypted_kyc_data);

    if ($decrypted_data === false) {
        return false;
    }

    $response_map = json_decode($decrypted_data, true);

    return $response_map;
}

function asymmetric_encrypt($message, $certificate) {
    $rsa =  RSA::load($certificate);

    $result = $rsa->encrypt($message);
    
    $result = $rsa->withPadding(RSA::ENCRYPTION_OAEP)
             ->withHash('sha256')
             ->encrypt($message);

    if ($result === false) {
        return false;
    }

    return $result;
}

function asymmetric_decrypt($encryptedData, $privateKeyPem) {
    $rsa =  RSA::load($privateKeyPem);

    $decryptedData = $rsa->decrypt($encryptedData);
    
    $decryptedData = $rsa->withPadding(RSA::ENCRYPTION_OAEP)
             ->withHash('sha256')
             ->decrypt($encryptedData);

    if ($decryptedData === false) {
        return false;
    }

    return $decryptedData;
}