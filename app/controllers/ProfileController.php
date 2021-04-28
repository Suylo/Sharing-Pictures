<?php

namespace App\controllers;

use App\models\PictureDAO;
use App\models\User;
use App\models\UserDAO;

class ProfileController extends MainController
{

    private static int $UID;
    private static User $userInfos;
    private static array $userPictures;
    private static $userFavoritePictures;

    public static function action()
    {
        self::$UID = $_GET["UID"];

        self::$userInfos = UserDAO::getUserByID(self::$UID);
        self::$userPictures = UserDAO::getPictureByUserID(self::$UID);
        self::$userFavoritePictures = UserDAO::getPicturesFavByUserID(self::$UID);
    }


    public static function displayContent()
    {
        self::action();
        MainController::include();


        if (isset($_POST["submit"])) {

            $pName = $_FILES['picture']['name'];
            $pWording = $_POST["pictureWording"];
            $uploadDirectory = "img/";

            PictureDAO::addPictureIntoDB($pWording, "img/" . $pName, self::$UID);
            move_uploaded_file($_FILES['picture']['tmp_name'], $uploadDirectory . $pName);
            header("Location: ?q=profile&UID=" . self::$UID);
            $message = "Image uploadée !";

        } else {
            $message = "Veuillez compléter les champs";
        }

        require_once 'app/views/profile.php';
    }


}





