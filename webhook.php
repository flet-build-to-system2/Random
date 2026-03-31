<?php
require_once "functions.php";

$update = json_decode(file_get_contents("php://input"), true);

if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];

    if ($text == "/start") {
        sendMessage($chat_id, "👋 Welcome!\nSend /random to get a random number.");
    }

    elseif ($text == "/random") {
        $number = getRandomNumber();
        sendMessage($chat_id, "🎲 Your random number is: $number");
    }

    else {
        sendMessage($chat_id, "❓ Unknown command. Use /random");
    }
}