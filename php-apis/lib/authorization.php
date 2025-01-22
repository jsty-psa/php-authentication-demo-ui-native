<?php

function get_authorization() {
    $authorization_request_body = [
        "requestTime" => getTime(),
        "version" => "string",
        "request" => [
            "clientId" => PHILSYS_CLIENT_ID,
            "secretKey" => PHILSYS_SECRET_KEY,
            "appId" => PHILSYS_APP_ID
        ]
    ];

    $authorization_request_header = [
        "Content-Type: application/json",
    ];

    $ch = curl_init(PHILSYS_ID_AUTH_MANAGER);

    // curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $authorization_request_header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($authorization_request_body));
    
    $authorization_response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // $authorization_response = json_decode($authorization_response, true);
    $authorization_response = explode(";", $authorization_response)[0];
    $authorization_response = explode(":", $authorization_response);
    $authorization = str_replace("Authorization=", "", $authorization_response[count($authorization_response) - 1]);

    return $authorization;
}