<?php

require_once './utils.php';

$update = requestDefault('devices/search', [
    "body" => [
        "search" => "3472d042-e56f-4cd1-b1e6-b7b320db35a9", // obtenha o devicetoken /api/v2/devices
        "device_ip" => "0.0.0.0",
        "server_search" => "9951855f-030a-4c8d-83c1-e7e3fb2172a2", // obtenha o serversearch /api/v2/servers
    ]
]);

if($update['error'] == false) {
    
    echo "Device atualizado com sucesso!";

    echo "<pre>";
    var_dump($update);
    echo "</pre>";

} else {
    echo "Erro ao atualizar device!";

    echo "<pre>";
    var_dump($update);
    echo "</pre>";
}

die;
