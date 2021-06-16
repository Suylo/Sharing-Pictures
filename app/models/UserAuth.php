<?php


namespace App\models;

class UserAuth
{

    private static string $msg;

    public static function userRegister()
    {

        $isRegistered = false;

        if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["userEmail"]) && isset($_POST["userPassword"])) {

            $regFirstName = $_POST["firstName"];
            $regLastName = $_POST["lastName"];
            $regEmail = $_POST["userEmail"];
            $regPassword = $_POST["userPassword"];

            $emailIsExist = UserDAO::countUserEmail($regEmail);

            if ($emailIsExist == 0) {
                $isItReg = UserDAO::userRegister($regFirstName, $regLastName, $regEmail, $regPassword);
                $_SESSION["userEmail"] = $regEmail;
                $_SESSION["userPassword"] = $regPassword;
                header("Location: ./home");

                if ($isItReg == true) {
                    $isRegistered = true;
                } else {
                    self::$msg = "Vous n'avez pas pu être enregistré, veuillez réessayer.";
                }
            } else if ($emailIsExist == 1) {
                header("Location: ./login");
            }
        }
    }

    public static function userLogin()
    {
        self::sessionStart();


        if (isset($_POST["userEmail"]) && isset($_POST["userPassword"])) {
            $email = $_POST["userEmail"];
            $postPassword = $_POST["userPassword"];

            $emailIsExist = UserDAO::countUserEmail($email);

            if ($emailIsExist == 1) {
                $userInfos = UserDAO::getUserByMail($email);
                $dbPassword = $userInfos->getUserPasswd();
                $dbEmail = $userInfos->getUserEmail();

                if (trim($dbPassword) == trim($postPassword) && (trim($email) == trim($dbEmail))) {
                    $_SESSION["userEmail"] = $dbEmail;
                    $_SESSION["userPassword"] = $dbPassword;
                    header("Location: ./home");
                } else if (trim($postPassword) != trim($dbPassword)) {
                    self::$msg = "Password ou Email incorrecte.";
                } else {
                    self::$msg = "";
                }
            } else if ($emailIsExist == 0) {
                header("Location: ./register");
            }
        }
    }

    public static function sessionStart()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function userLogout()
    {
        self::sessionStart();
        unset($_SESSION["userEmail"]);
        unset($_SESSION["userPassword"]);
        header("Location: ./home");
    }

    public static function getMailLoggedOn()
    {
        if (self::userIsLoggedOn()) {
            $email = $_SESSION["userEmail"];
        } else {
            $email = "";
        }
        return $email;
    }

    public static function userIsLoggedOn(): bool
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