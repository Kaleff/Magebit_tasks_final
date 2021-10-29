<?php

namespace App\Components;

use PDO;

class DB
{
    public static function getConnection()
    {
        $paramsPath = ROOT . "/config/db_parameters.php";
        $params = include($paramsPath);
        try {
            $pdo = new \PDO(
                "mysql:host={$params['server']};dbname={$params['name']}",
                $params['username'],
                $params['password']
            );
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
        return $pdo;
    }
}
