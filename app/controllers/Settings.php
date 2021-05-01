<?php

namespace App\controllers;

use App\models\User;
use App\models\UserAuth;
use App\models\UserDAO;


class Settings extends MainController
{

    private static User $userInfos;
    private static String $msg;

    public static function displayContent()
    {
        MainController::include();
        self::checkForm();
        require_once "app/views/settings.php";
    }

    public static function checkForm()
    {
        self::$userInfos = UserDAO::getUserByMail(UserAuth::getInstance()->getMailLoggedOn());
        $userID = self::$userInfos->getUserID();
        $userMail = self::$userInfos->getUserEmail();

        if (isset($_POST["save"])) {
            UserDAO::editUserInfos($_POST["firstName-edit"],
                $_POST["lastName-edit"],
                $_POST["Address-edit"],
                $_POST["postalCode-edit"],
                $_POST["userBirthdate-edit"],
                $userID
            );
            header("Location: ./settings");
        }

        if (isset($_POST["confirmation"]) && isset($_POST["submitDelete"]) && $_POST["confirmation"] == $userMail) {
            UserAuth::getInstance()->userLogout();
            UserDAO::removeUserFromDB($userID);
        } else if (isset($_POST["submitDelete"]) && $_POST["confirmation"] == "") {
            self::$msg = "Le champ de confirmation n'a pas été rempli !";
        } else if (isset($_POST["submitDelete"]) && $_POST["confirmation"] != $userMail) {
            self::$msg = "L'adresse donné ne correspond pas à la votre ! N'essayez pas de supprimer un autre compte :)";
        } else {
            self::$msg = "";
        }
    }

}


