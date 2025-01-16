<?php
    // if(isset($_REQUEST["type"]) && isset($_REQUEST["count"]) && isset($_REQUEST["port"])) {
    if(true) {
        // $date = date(DATE_ISO8601);
        // $type = $_REQUEST["type"];
        // $count = $_REQUEST["count"];
        // $port = $_REQUEST["port"];

        $date = date(DATE_ISO8601);
        $type = "Finger";
        $count = 1;
        $port = "4501";

        $params = [
            "env" => "Staging",
            "purpose" => "Auth",
            "specVersion" => "0.9.5.1.5",
            "timeout" => "300000",
            "captureTime" => $date,
            "domainUri" => "https://api.apps-external.uat2.phylsys.gov.ph",
            "transactionId" => "1234567890",
            "bio" => [
                [
                    "type" => $type, 
                    "count" => $count,
                    "bioSubType" => ["UNKNOWN"],
                    "requestedScore" => "60",
                    "deviceId" => "2147000102",
                    "deviceSubId" => "1",
                    "previousHash" => ""
                ]
            ],
            "customOpts" => [
                [
                    "name" => "name1",
                    "value" => "value1"
                ]
            ]
        ];

        $fingerprint_url = "https://127.0.0.1:" . $port . "/capture";

        $headers = [
            "Content-Type: application/json",
            "Accept: */*"
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $fingerprint_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "CAPTURE");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "Error: " . curl_error($ch);
            curl_close($ch);
            exit;
        }

        curl_close($ch);

        $data = json_decode($response, true);
        $data = $data['biometrics'];
        $result = json_encode($data, JSON_PRETTY_PRINT);

        echo $result;
    }
?>