<?php


namespace App\controllers;

use App\models\UserAuth;

class Login extends MainController
{

    public static function displayContent()
    {
        UserAuth::getInstance()->userLogin();

        MainController::include();

        include_once 'app/views/authLogin.php';
    }

}