<?php

namespace App\controllers;

use App\models\User;
use App\models\UserAuth;
use App\models\UserDAO;


class Settings extends MainController
{

    private static User $userInfos;

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

        if (isset($_POST["save"])) {
            UserDAO::editUserInfos($_POST["firstName-edit"],
                $_POST["lastName-edit"],
                $_POST["Address-edit"],
                $_POST["postalCode-edit"],
                $_POST["userBirthdate-edit"],
                $userID
            );
            header("Location: ?q=settings");
        }

        if (isset($_POST["confirmation"]) && isset($_POST["submitDelete"]) && $_POST["confirmation"] == $userID) {
            UserAuth::getInstance()->userLogout();
            UserDAO::removeUserFromDB($userID);
        }
    }

}


