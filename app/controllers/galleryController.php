<?php

namespace App\controllers;

use App\models\PictureDAO;
use App\models\UserAuth;

class galleryController extends mainController
{

    private static array $listOfPictures;

    public static function displayContent()
    {
        self::$listOfPictures = PictureDAO::getAllPictures();

        UserAuth::sessionStart();
        mainController::include();

        include 'app/views/gallery.php';
    }

}
