<?php

$curl = curl_init();

curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://cluster.apigratis.com/api/v2/evolution/message/sendPoll',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		    "number": "5531994359434",
		    "options": {
		      "delay": 1200,
		      "presence": "composing"
		    },
		    "pollMessage": {
		      "name": "Main text of the poll",
		      "selectableCount": 1,
		      "values": [
			  "Question 1",
			  "Question 2",
			  "Question 3"
		      ]
		    }
		}',
		CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'DeviceToken: 1c6f531d-c785-4655-bb70.....',
				'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9......'
		),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
