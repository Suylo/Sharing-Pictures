<?php

namespace App\controllers;

use App\models\PictureDAO;
use App\models\UserAuth;

class GalleryController extends MainController
{

    private static array $listOfPictures;

    public static function displayContent()
    {
        self::$listOfPictures = PictureDAO::getAllPictures();

        UserAuth::sessionStart();
        self::include();

        include 'app/views/gallery.php';
    }

}
