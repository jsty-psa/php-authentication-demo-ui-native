<?php

use Gamegos\JWS\JWS;

function generate_signature($payload, $partner_private_key) {
    $partner_id = PHILSYS_RP_PARTNER_ID;

    // openssl_pkcs12_read(file_get_contents("../keys/$partner_id/$partner_id-partner.p12"), $partner_p12, CERT_PASSPHRASE);
    // $partner_private_key = $partner_p12["pkey"];
    // $partner_public_key = $partner_p12["cert"];
    $partner_signed_cert = file_get_contents("../keys/$partner_id/$partner_id-signedcertificate.cer");

    // $public_key_content = str_replace(["-----BEGIN CERTIFICATE-----", "-----END CERTIFICATE-----", "\n", "\r"], "", $partner_public_key);
    $signed_key_content = str_replace(["-----BEGIN CERTIFICATE-----", "-----END CERTIFICATE-----", "\n", "\r"], "", $partner_signed_cert);

    $headers = [
        "x5c" => [$signed_key_content],
        "alg" => "RS256",
    ];
    
    $jws = new JWS();
    $jws = $jws->encode($headers, $payload, $partner_private_key);
    $jws_parts = explode(".", $jws);
    $jws = "$jws_parts[0]..$jws_parts[2]";

    return $jws;
}