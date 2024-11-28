<?php
    ini_set('display_errors', 1);

    require_once '../vendor/autoload.php';
    require_once 'constants.php';
    require_once 'lib/utils.php';
    require_once 'lib/signature.php';
    require_once 'lib/crypto.php';
    require_once 'lib/authorization.php';
    
    $partner_id = PHILSYS_RP_PARTNER_ID;

    if($_REQUEST['individual_id'] && $_REQUEST['individual_id_type']) {
        $individual_id = $_REQUEST["individual_id"];
        $individual_id_type = $_REQUEST["individual_id_type"];
        $otp_email = filter_var($_REQUEST["otp_email"], FILTER_VALIDATE_BOOLEAN);
        $otp_phone = filter_var($_REQUEST["otp_phone"], FILTER_VALIDATE_BOOLEAN);
        
        $partner_private_key = file_get_contents("../keys/$partner_id/$partner_id-partner-private-key.pem");
        $otp_channels = [];

        if(isset($_REQUEST["otp_email"]) && $otp_email) {
            array_push($otp_channels, "email");
        }

        if(isset($_REQUEST["otp_phone"]) && $otp_phone) {
            array_push($otp_channels, "phone");
        }

        $otp_request_body = [
            "id" => "philsys.identity.otp",
            "version" => "1.0",
            "transactionID" => "1234567890",
            "requestTime" => getTime(),
            "individualId" => $individual_id,
            "individualIdType" => $individual_id_type,
            "otpChannel" => $otp_channels,
        ];

        $otp_request_header = [            
            "Signature: ".generate_signature($otp_request_body, $partner_private_key),
            "Authorization: ".getAuthorization(),
            "Content-Type: application/json",
        ];

        $ch = curl_init(PHILSYS_OTP_URL);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $otp_request_header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($otp_request_body));
        
        $otp_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $otp_response = json_decode($otp_response, true);

        if(!$otp_response['errors']) {
            $seckey_enc = $otp_response["responseSessionKey"];
            $response_enc = $otp_response["response"];                
                
            $seckey = base64_url_decode($seckey_enc);
            $response = base64_url_decode($response_enc);

            $secKey = asymmetric_decrypt($seckey, $partner_private_key);
            $response = symmetric_decrypt($response, $secKey);

            echo json_encode($response);
        }
        else {
            echo json_encode($otp_response);
        }
    }

?>