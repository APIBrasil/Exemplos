<?php
//php -S localhost:8000 .\sendTextGet.php
//http://localhost:8000/?number=5531994359434&text=Ol%C3%A1%20mensagem

$number = isset($_GET['number']) ? $_GET['number'] : null;
$text = isset($_GET['text']) ? $_GET['text'] : null;

if(!$number || !$text){
    echo 'Informe o número e o texto';
    exit;
}

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://gateway.apibrasil.io/api/v2/whatsapp/sendText',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "number": "' . $number . '",
      "text": "' . $text . '"
  }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'DeviceToken: OBTENHA_O_SEU_DEVICE_TOKEN_NO_PAINEL',
        'Authorization: Bearer OBTENHA_O_SEU_TOKEN'
    ),
)
);

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>
