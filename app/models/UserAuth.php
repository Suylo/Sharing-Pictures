<?php


namespace App\models;

class UserAuth
{

    private static UserAuth $_instance;

    public static function getInstance(): UserAuth
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function userLogin()
    {
        self::sessionStart();

        if (isset($_POST["userEmail"]) && isset($_POST["userPassword"])) {
            $email = $_POST["userEmail"];
            $postPassword = $_POST["userPassword"];

            $userInfos = UserDAO::getUserByMail($email);
            $dbPassword = $userInfos->getUserPasswd();
            $dbEmail = $userInfos->getUserEmail();

            if (trim($dbPassword) == trim($postPassword) && (trim($email) == trim($dbEmail))) {
                $_SESSION["userEmail"] = $email;
                $_SESSION["userPassword"] = $dbPassword;
                header("Location: ?q=home");
            } else {
                header("Location: ?q=register");
            }
        }
    }

    public static function sessionStart()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function userLogout()
    {
        self::sessionStart();
        unset($_SESSION["userEmail"]);
        unset($_SESSION["userPassword"]);
        header("Location: ?q=home");
    }

    public function getMailLoggedOn()
    {
        if (self::userIsLoggedOn()) {
            $ret = $_SESSION["userEmail"];
        } else {
            $ret = "";
        }
        return $ret;
    }

    public function userIsLoggedOn(): bool
    {
        $logged = false;

        self::sessionStart();

        if (isset($_SESSION["userEmail"])) {
            $userInfos = UserDAO::getUserByMail($_SESSION["userEmail"]);

            if ($userInfos->getUserEmail() == $_SESSION["userEmail"] && $userInfos->getUserPasswd() == $_SESSION["userPassword"]) {
                $logged = true;
            }
        }
        return $logged;
    }

}