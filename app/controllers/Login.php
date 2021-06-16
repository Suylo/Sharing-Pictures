<?php


namespace App\controllers;

use App\models\UserAuth;

class Login extends MainController
{
    public static function displayContent()
    {
        self::redirectIf();
        self::include();
        UserAuth::userLogin();

        include_once 'app/views/authLogin.php';
    }

}