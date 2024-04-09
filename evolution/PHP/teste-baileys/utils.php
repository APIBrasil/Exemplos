<?php

// função para fazer requisições na apibrasil
function requestDefault(String $action = '', Array $data = []) {

    try {

        // url base da apibrasil v2
        $base_uri = "https://cluster.apigratis.com/api/v2/$action";

        // se passar o method no array, ele será usado, senão, será usado o POST
        $method = isset($data['method']) ? $data['method'] : "POST";
        
        // seu bearer token que dura 1 ano e é gerado na aba /api/v2/login
        $bearerToken = ".....vwT4CM5BTl8_OmnKw8dIxi3qe1WPKcfTL3x6KhcwVaY";

        // define as variáveis se existirem no array, senão, define como vazio
        $deviceToken = $data['DeviceToken'] ?? '';
        $SecretKey = $data['SecretKey'] ?? '';
        $body = $data['body'] ?? [];

        // define os headers com device token bearer e secret key
        // o secret só é usado se for criar um novo dispositivo
        $headers = array(
            "Content-Type:application/json",
            "Accept:application/json",
            "Authorization: Bearer $bearerToken",
            "DeviceToken: $deviceToken",
            "SecretKey: $SecretKey"
        );

        // request com curl
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $base_uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER => false, // não verificar o ssl
            CURLOPT_SSL_VERIFYHOST => false, // não verificar o ssl
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => $headers,
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);

        // retorna o json decodificado
        $callback = json_encode(json_decode($response), JSON_PRETTY_PRINT);

        return json_decode($callback, true); 

    } catch (Exception $e) {
        return $e->getMessage();
    }

}

?>