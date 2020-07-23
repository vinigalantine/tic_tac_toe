<?php

namespace App\Models;

class Connection
{

    private static $host = "localhost";
    private static $port = "3308";
    private static $db_name = "tic_tac_toe";
    private static $user = "root";
    private static $password = "";

    private static $conneciton;

    private function __construct()
    {
    }

    public static function getConn()
    {
        if (is_null(self::$conneciton)) {
            self::$conneciton = new \PDO('mysql:host=' . self::$host . ';port=' . self::$port . ';dbname=' . self::$db_name, self::$user, self::$password);
            self::$conneciton->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$conneciton;
    }
}
