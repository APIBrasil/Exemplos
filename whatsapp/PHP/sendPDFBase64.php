<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://gateway.apibrasil.io/api/v2/whatsapp/sendFile64',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	    CURLOPT_SSL_VERIFYHOST=> false,
	    CURLOPT_SSL_VERIFYPEER=> false,
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS =>'{
	    "number": "5531994359434",
	    "caption": "Isso é um teste APIBRASIL!",
	    "path" : "data:application/pdf;base64,JVBERi0xLjQKJcOkw7zDtsOfCjIgMCBvYmoKPDwvTGVuZ3RoID....",
	}',
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json',
		'DeviceToken: SUA_CREDENCIAL',
		'Authorization: Bearer eyJ0eXA............'
	),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
