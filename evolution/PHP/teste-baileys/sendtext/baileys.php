<?php

require_once './utils.php';

$response = requestDefault('evolution/message/sendText', [
    "DeviceToken" => "9c60a5a7-d7c6-4c59-93df-d563c024e7f6", //your device token
    "body" => [
        "number" => "5531994359434",
        "options" => [
            "delay" => 1200,
            "presence" => "composing"
        ],
        "textMessage" => [
            "text" => "Teste Evolution API, via APIBRASIL!"
        ]
    ]
]);

var_dump($response);

die;
