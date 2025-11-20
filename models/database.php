<?php

class Database
{
    private static $pdo;

    public static function getConnection($config)
    {
        self::$pdo = null;

        try {
            self::$pdo = new PDO(
                "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'],
                $config['username'],
                $config['password']
            );
            self::$pdo->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return self::$pdo;
    }
}
