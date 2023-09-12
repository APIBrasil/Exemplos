<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://cluster.apigratis.com/api/v2/evolution/instance/connectionState',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
	CURLOPT_HTTPHEADER => array(
	'Content-Type: application/json',
	'DeviceToken: ba673f52-7402-4cc4-95bb...',
	'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.....'
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
