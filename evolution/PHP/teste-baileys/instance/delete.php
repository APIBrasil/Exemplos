<?php

require_once './utils.php';

$devicetoken = $_GET['devicetoken'] ?? null;

if(empty($devicetoken)) {
    echo "Informe o devicetoken na url!";
    die;
}

$restart = requestDefault('evolution/instance/delete', [
    "DeviceToken" => $devicetoken, //your device token
    "method" => "DELETE",
]);

if($restart['error'] == false) {
    
    echo "Conexão removida com sucesso!";

    echo "<pre>";
    var_dump($restart);
    echo "</pre>";

} else {

    echo "Erro ao remover a conexão!";

    echo "<pre>";
    var_dump($restart);
    echo "</pre>";
}

die;
