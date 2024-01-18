<?php

// Captura o parâmetro 'placa' da URL
$placa = isset($_GET['placa']) ? $_GET['placa'] : 'OQH3065'; // OQH3065 como padrão se nenhum parâmetro for fornecido

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://gateway.apibrasil.io/api/v2/vehicles/dados',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    //SSL VERIFY
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode(['placa' => $placa]),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json', 
        'DeviceToken: SEU_DEVICE_TOKEN', // obter no painel da API
        'Authorization: Bearer SEU_BEARER_TOKEN' // nao remover a palavra Bearer
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
