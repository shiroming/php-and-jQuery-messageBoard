<?php

header('Content-Type: application/json');

require_once '../class/Message.php';

$message = new Message;

echo json_encode($message->getRecentMessages());
