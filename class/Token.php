<?php

class Token
{
    public static function generate()
    {
        return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    public static function check($token)
    {
        return isset($_SESSION['token']) && $token === $_SESSION['token'];
    }
}
