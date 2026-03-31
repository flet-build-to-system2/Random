<?php
require_once "config.php";

$input = file_get_contents("php://input");
$update = json_decode($input, true);

if (!$update) {
    exit;
}

function sendMessage($chat_id, $text) {
    $url = API_URL . "sendMessage";
    file_get_contents($url . "?chat_id=$chat_id&text=" . urlencode($text));
}

if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"] ?? '';

    if ($text == "/start") {
        sendMessage($chat_id, "Bot works on Render ✅");
    } elseif ($text == "/random") {
        sendMessage($chat_id, rand(1,100));
    }
}
