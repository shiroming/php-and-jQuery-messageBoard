<?php

session_start();

header('Content-Type: application/json');

require_once '../class/Message.php';
require_once '../class/Token.php';
require_once '../functions.php';

if (checkPostIsValid()) {
    die('not access');
}

$name = escape($_POST['name']);
$message = escape($_POST['message']);

if ((new Message)->store($name, $message)) {
    echo json_encode([
        'name' => $name,
        'message' => $message,
    ]);
}
