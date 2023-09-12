<?php

$curl = curl_init();

curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://cluster.apigratis.com/api/v2/sms/send',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
        "number":"5531994359434",
        "message": "Ola mundo!"
    }',
		CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'DeviceToken: 4bb5c0f3-8c8a-46b9-9854-3cf92b5ebb3b',
				'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9....'
		),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
