<?php

function escape($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function checkPostIsValid()
{
    return $_SERVER['REQUEST_METHOD'] !== 'POST' or ! isset($_POST['token']) or ! Token::check($_POST['token']);
}
