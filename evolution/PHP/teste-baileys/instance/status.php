<?php

require_once './utils.php';

$devicetoken = $_GET['devicetoken'] ?? null;

// verifica se o devicetoken foi informado
if(empty($devicetoken)) {
    echo "Informe o devicetoken e o serversearch na url!";
    die;
}

// usa a request padrão para criar o qrcode
$status = requestDefault('evolution/instance/connectionState', [
    "DeviceToken" => $devicetoken,
    "method" => "GET",
]);

if($status['error'] == false) {
    
    echo "Chamada do status do device com sucesso!";

    echo "<pre>";
    var_dump($status);
    echo "</pre>";

} else {
    
    echo "Erro ao chamar o status do device!";

    echo "<pre>";
    var_dump($status);
    echo "</pre>";
}

die;
