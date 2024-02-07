<?php

require_once './utils.php';

// obtem os parametros da url
$devicename = $_GET['devicename'] ?? null;
$devicetoken = $_GET['devicetoken'] ?? null;

// verifica se os parametros foram informados
if(empty($devicename) || empty($devicetoken)) {
    echo "Informe o nome do device e o devicetoken na url!";
    die;
}

// usa a request padrão para criar o qrcode
$create = requestDefault('evolution/instance/create', [
    "DeviceToken" => $devicetoken,
    "body" => [
        "instanceName" => $devicename, //deve ter o mesmo nome do device
        "qrcode" => true,
    ]
]);

// trata o retorno da request
if($create['error'] == false) {
    
    echo "QrCode criado com sucesso!";
    
    $qrcode = $create['response']['qrcode']['base64'];

    echo "<img src='$qrcode' />";

} else {

    echo "Erro ao criar a conexão!";

    echo "<pre>";
    var_dump($create);
    echo "</pre>";
}

die;
