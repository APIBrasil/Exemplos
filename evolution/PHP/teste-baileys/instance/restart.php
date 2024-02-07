<?php

require_once './utils.php';

$devicetoken = $_GET['devicetoken'] ?? null;

if(empty($devicetoken)) {
    echo "Informe o devicetoken na url!";
    die;
}

// usa a request padrão para restartar a conexão
$restart = requestDefault('evolution/instance/restart', [
    "DeviceToken" => $devicetoken, //your device token
    "method" => "GET",
]);

// trata o retorno da request
if($restart['error'] == false) {
    
    echo "Restart com sucesso!";

    echo "<pre>";
    var_dump($restart);
    echo "</pre>";

} else {

    echo "Erro ao restart a conexão!";

    echo "<pre>";
    var_dump($restart);
    echo "</pre>";
}

die;
