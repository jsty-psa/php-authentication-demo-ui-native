<?php
    ini_set('display_errors', 1);
    require_once '../vendor/autoload.php';
    require_once 'constants.php';
    require_once 'lib/utils.php';
    require_once 'lib/signature.php';
    require_once 'lib/crypto.php';
    require_once 'lib/authorization.php';

    use phpseclib3\Crypt\Random;

    $partner_id = PHILSYS_RP_PARTNER_ID;
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $authentication_request_body = [
            "id" => isset($_REQUEST["input_ekyc"]) && $_REQUEST["input_ekyc"] === "on" ? "philsys.identity.kyc" : "philsys.identity.auth",
            "version" => PHILSYS_VERSION,
            "requestTime" => getTime(),
            "env" => PHILSYS_ENVIRONMENT,
            "domainUri" => PHILSYS_BASE_URL,
            "transactionID" => PHILSYS_DUMMY_TRANSACTION_ID,
            "requestedAuth" => [
                "otp" => isset($_REQUEST["input_otp"]) && $_REQUEST["input_otp"] === "on",
                "demo" => isset($_REQUEST["input_demo"]) && $_REQUEST["input_demo"] === "on",
                "bio" => isset($_REQUEST["input_bio"]) && $_REQUEST["input_bio"] === "on",
            ],
            "consentObtained" => true,
            "individualId" => $_REQUEST["individual_id"],
            "individualIdType" => $_REQUEST["individual_id_type"],
            "request" => [
                "timestamp" => getTime(),
                "otp" => isset($_REQUEST["input_otp"]) && $_REQUEST["input_otp"] === "on" ? $_REQUEST["input_otp_value"] : null,
                "demographics" => isset($_REQUEST["input_demo"]) && $_REQUEST["input_demo"] === "on" ? json_decode(preg_replace("/'([^']+)'/", '"$1"', $_REQUEST["input_demo_value"]), true) : null,
                "biometrics" => isset($_REQUEST["input_bio"]) && $_REQUEST["input_bio"] === "on" ? json_decode(preg_replace("/'([^']+)'/", '"$1"', $_REQUEST["input_bio_value"]), true) : null,
            ]
        ];

        $aes_secret_key = Random::string(32);
        $partner_private_key = file_get_contents("../keys/$partner_id/$partner_id-partner-private-key.pem");
    
        $authentication_request_request = json_encode($authentication_request_body["request"]);

        $authentication_request_body["request"] = symmetric_encrypt($authentication_request_request, $aes_secret_key);
        $authentication_request_body["request"] = base64_url_safe_string($authentication_request_body["request"]);
    
        // openssl_pkcs12_read(file_get_contents("../keys/$partner_id/$partner_id-partner.p12"), $partner_p12, CERT_PASSPHRASE);
        // $ida_certificate = $partner_p12["cert"];
        $ida_certificate = file_get_contents("../keys/$partner_id/$partner_id-IDAcertificate.cer");
        // $ida_certificate = openssl_x509_read($ida_certificate);
        $ida_certificate_key = openssl_pkey_get_public($ida_certificate);
        $ida_certificate_key = openssl_pkey_get_details($ida_certificate_key)["key"];
    
        $authentication_request_body["requestSessionKey"] = asymmetric_encrypt($aes_secret_key, $ida_certificate_key);
        $authentication_request_body["requestSessionKey"] = base64_url_safe_string($authentication_request_body["requestSessionKey"]);
    
        $requestHMAC = print_hex_binary($authentication_request_request);
        $authentication_request_body["requestHMAC"] = symmetric_encrypt($requestHMAC, $aes_secret_key);
        $authentication_request_body["requestHMAC"] = base64_url_safe_string($authentication_request_body["requestHMAC"]);
    
        $authentication_request_body["thumbprint"] = get_thumbprint($ida_certificate);

        $authentication_request_header = [            
            "Signature: ".generate_signature($authentication_request_body, $partner_private_key),
            "Authorization: ".getAuthorization(),
            "Content-Type: application/json",
        ];

        $authentication_url = isset($_REQUEST["input_ekyc"]) && $_REQUEST["input_ekyc"] === "on" ? PHILSYS_EKYC_URL : PHILSYS_AUTH_URL;

        $ch = curl_init($authentication_url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $authentication_request_header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($authentication_request_body));
        
        $authentication_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
    
        $authentication_response = json_decode($authentication_response, true);
        
        if(!$authentication_response['errors']) {
            $seckey_enc = $authentication_response["responseSessionKey"];
            $response_enc = $authentication_response["response"];                

            $seckey = base64_url_decode($seckey_enc);
            $response = base64_url_decode($response_enc);

            $secKey = asymmetric_decrypt($seckey, $partner_private_key);
            $response = symmetric_decrypt($response, $secKey);

            echo json_encode($response);
        }
        else {
            echo json_encode($authentication_response);
        }
    }
    else {
        echo "Route not Found.";
    }