<?php

namespace App\controllers;


use App\models\PictureDAO;

class Search extends MainController
{

    private static $query;
    private static $listOfPicturesByDesc;
    private static $listOfAllPictures;

    public static function action()
    {
        self::$query = $_GET["query"];
        self::$listOfPicturesByDesc = PictureDAO::getAllPicturesByWording(self::$query);
        self::$listOfAllPictures = PictureDAO::getAllPictures();
    }

    public static function displayContent()
    {
        self::action();
        self::include();
        include "app/views/search.php";
    }

}