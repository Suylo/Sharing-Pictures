<?php

namespace App\controllers;

use App\models\PictureDAO;
use App\models\UserAuth;
use App\models\UserDAO;

class HomeController extends MainController
{

    public static function displayContent()
    {
        $userIsLogged = UserAuth::userIsLoggedOn();
        if ($userIsLogged) {
            $userInfos = UserDAO::getUserByMail(UserAuth::getMailLoggedOn());
            $firstName = $userInfos->getFirstName();
            $lastName = $userInfos->getLastName();
            $userID = $userInfos->getUserID();

            $lastFivePictures = PictureDAO::getLastFivePictures($userID);
        }

        $picturesAddedRecently = PictureDAO::getLastPictures();

        self::include();
        include 'app/views/home.php';
    }

}

