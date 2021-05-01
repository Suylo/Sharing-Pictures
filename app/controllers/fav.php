<?php

namespace App\controllers;

use App\models\PictureDAO;
use App\models\UserAuth;

class fav extends MainController
{

    private static int $idP;
    private static int $idU;
    private static int $idUC;
    private static string $state;

    public static function action()
    {
        self::$idP = $_GET["idP"];
        self::$idU = $_GET["idU"];
        self::$idUC = $_GET["idUC"];
        self::$state = $_GET["like"];
    }


    public static function content()
    {
        self::action();
        $email = UserAuth::getInstance()->getMailLoggedOn();

        if ($email != "") {
            if (self::$state == "yes") {
                PictureDAO::addFavPicture(self::$idUC, self::$idP);
            } else if (self::$state == "no") {
                PictureDAO::removeFavPicture(self::$idUC, self::$idP);
            }
        }

        header("Location: ./pictures-p" . self::$idP . "-u" . self::$idU);
    }


}