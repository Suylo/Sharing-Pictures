<?php

namespace App\models;

use PDO;
use PDOException;

class DAO
{

    protected static $connDb;
    private static string $host = "localhost";
    private static string $db = "sharingpictures";
    private static string $user = "root";
    private static string $passwd = "";

    public static function init(): PDO
    {
        try {
            self::$connDb = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$passwd,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            self::$connDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$connDb;
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            die();
        }
    }


}
