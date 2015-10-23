<?php

class Message
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('sqlite:../db.sqlite');
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function store($name, $message)
    {
        $sql = "insert into messages (name, message) values ('{$name}', '{$message}')";
        $this->pdo->query($sql);

        return (bool) $this->pdo->lastInsertId();
    }

    public function getRecentMessages($count = 10)
    {
        $sql = "select name, message from messages order by id desc limit {$count}";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }
}
