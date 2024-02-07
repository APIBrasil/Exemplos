<?php

require_once './utils.php';

$store = requestDefault('devices/store', [
    "SecretKey" => "06b8f746-b268-4234-a0b6-5c88a84caa47", // sua secret key /api/v2/apis
    "body" => [
        "server_search" => "9951855f-030a-4c8d-83c1-e7e3fb2172a2", // Obtenha o serversearch /api/v2/servers 
        "type" => "cellphone", // Tipos cellphone/tablet
        "device_name" => "zap99", // Defina um nome para o device
        "device_key"=> "zap99", // Defina um device key
        "device_ip" => "0.0.0.0", // IP de origem da requisição
        "webhook_wh_message" => "", // Webhook de mensagens
        "webhook_wh_status" => "" // Webhook de status
    ]
]);

if($store['error'] == false) {
    
    echo "Device cadastrado com sucesso!";

    echo "<pre>";
    var_dump($store);
    echo "</pre>";

} else {
    echo "Erro ao cadastrar device!";

    echo "<pre>";
    var_dump($store);
    echo "</pre>";
}

die;
