<?php


namespace App\controllers;

use App\models\UserAuth;

class login extends mainController
{

    public static function displayContent()
    {
        UserAuth::getInstance()->userLogin();

        mainController::include();

        include_once 'app/views/authLogin.php';
    }

}







