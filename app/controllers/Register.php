<?php

namespace App\controllers;

use App\models\UserAuth;

class Register extends MainController
{

    public static function displayContent()
    {
        self::redirectIf();
        self::include();
        UserAuth::userRegister();
        include 'app/views/authRegister.php';
    }

}





