<?php

require_once './utils.php';

$response = requestDefault('evolution/message/sendText', [
    "Bearer" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3BsYXRhZm9ybWEuYXBpYnJhc2lsLmNvbS5ici9hdXRoL2xvZ2luIiwiaWF0IjoxNjc2MzA0NjgxLCJleHAiOjE3MDc4NDA2ODEsIm5iZiI6MTY3NjMwNDY4MSwianRpIjoiNEVBWDBubWFPUDVaazN0UiIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.vwT4CM5BTl8_OmnKw8dIxi3qe1WPKcfTL3x6KhcwVaY", //your bearer token
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
