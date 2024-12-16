<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://gateway.apibrasil.io/api/v2/devices/store',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_SSL_VERIFYHOST=> false,
  CURLOPT_SSL_VERIFYPEER=> false,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
      "type": "cellphone",
      "device_name" : "zap1",
      "device_key": "zapzap1",
      "device_ip": "0.0.0.0",
      "server_search": "0a3c91a6-63e3-499c-886c-5b8ca115e06d",
      "webhook_wh_message":"",
      "webhook_wh_status":""
  }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'SecretKey: OBTENHA_O_SEU_SECRET_TOKEN_NO_PAINEL',
    'PublicToken: OBTENHA_O_SEU_PUBLIC_TOKEN_NO_PAINEL',
    'Authorization: Bearer OBTENHA_O_SEU_TOKEN'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
