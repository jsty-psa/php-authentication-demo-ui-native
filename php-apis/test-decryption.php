<?php
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';
require_once 'constants.php';
require_once 'lib/utils.php';
require_once 'lib/crypto.php';

if($_REQUEST["request"] && $_REQUEST["requestSessionKey"]) {

    $request = $_REQUEST["request"];
    $session_key = $_REQUEST["requestSessionKey"];
    
    $partner_id = PHILSYS_RP_PARTNER_ID;
    openssl_pkcs12_read(file_get_contents("../keys/$partner_id/$partner_id-inter.p12"), $partner_p12, CERT_PASSPHRASE);
    $partner_private_key = file_get_contents("../keys/$partner_id/private_key.pem");
    
    $session_key = base64_url_decode($session_key);
    $request = base64_url_decode($request);
    
    var_dump($session_key);
    
    echo "<br><br>";
    
    $session_key = asymmetric_decrypt($session_key, $partner_private_key);
    
    var_dump($session_key);
    
    echo "<br><br>";
    
    $request = symmetric_decrypt($request, $session_key);
    
    
    var_dump($request);
}
else {
    echo "Route not found.";
}