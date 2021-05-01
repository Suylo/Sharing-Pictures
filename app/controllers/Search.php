<?php

namespace App\controllers;


use App\models\PictureDAO;

class Search extends MainController{

    private static $query;
    private static $listOfPicturesByDesc;
    private static $listOfAllPictures;
    private static $q;


    public static function action()
    {
        self::$query = $_GET["query"];
        self::$q = $_GET["q"];
        self::$listOfPicturesByDesc = PictureDAO::getAllPicturesByWording(self::$query);
        self::$listOfAllPictures = PictureDAO::getAllPictures();
    }

    public static function checkForm()
    {
        if (isset($_POST["submit_search"])){
        }
    }


    public static function displayContent()
    {
        self::action();
        self::include();

        include "app/views/search.php";
    }


}