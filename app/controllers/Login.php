<?php


namespace App\controllers;

use App\models\UserAuth;

class Login extends MainController
{
    private static String $msg;

    public static function displayContent()
    {
        self::$msg = "";
        MainController::include();
        UserAuth::getInstance()->userLogin();

        include_once 'app/views/authLogin.php';
    }

}