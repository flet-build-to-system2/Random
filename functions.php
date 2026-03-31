<?php
require_once "config.php";

function sendMessage($chat_id, $text) {
    $url = API_URL . "sendMessage";

    $data = [
        'chat_id' => $chat_id,
        'text' => $text
    ];

    file_get_contents($url . "?" . http_build_query($data));
}

function getRandomNumber() {
    return rand(1, 100);
}