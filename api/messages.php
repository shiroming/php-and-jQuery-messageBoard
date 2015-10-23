<?php

session_start();

header('Content-Type: application/json');

require_once '../class/Message.php';
require_once '../class/Token.php';

if (! isset($_GET['token']) or ! Token::check($_GET['token'])) {
    die('not access');
}

$message = new Message;

echo json_encode($message->getRecentMessages());
