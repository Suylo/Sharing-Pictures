<?php

namespace App\controllers;

use App\models\Picture;
use App\models\PictureDAO;
use App\models\User;
use App\models\UserAuth;
use App\models\UserDAO;


class PicturesController extends MainController
{


    private static int $pID;
    private static int $UID;
    private static User $userInfos;
    private static Picture $pictureInfos;
    private static bool $isConnected;
    private static int $UIDofUserLogged;
    private static int $numberOfLikes;
    private static array $listOfComments;
    private static int $favPicture;


    public static function action()
    {
        // Get UID and PID in URL parameters
        self::$pID = $_GET["idP"];
        self::$UID = $_GET["idU"];

        // Get all functions
        self::$userInfos = UserDAO::getUserByID(self::$UID);
        self::$pictureInfos = PictureDAO::getPictureByPictureID(self::$pID);
        self::$isConnected = UserAuth::getInstance()->userIsLoggedOn();
    }

    public static function checkForm()
    {

        self::$favPicture = PictureDAO::getFavPictureByIDs(self::$pID, self::$UIDofUserLogged);

        // Comment section, check if comment, submit and if user is connected
        if (isset($_POST["comment"]) && isset($_POST["submit_comment"]) && $_POST["comment"] != "" && self::$isConnected) {
            $content = $_POST["comment"];
            PictureDAO::addComment(self::$UIDofUserLogged, self::$pID, $content);
            header("Location: ./pictures-p" . self::$pID . "-u" . self::$UID);
        }

        // Delete picture section, check if
        if (isset($_POST["delete_picture"])) {
            PictureDAO::removePictureFromDB(self::$pID, self::$UID);
            header("Location: ./user-" . self::$UIDofUserLogged);
        }

        self::$numberOfLikes = PictureDAO::countFavPictureByID(self::$pID);
        self::$listOfComments = PictureDAO::getAllCommentsOfPictureByID(self::$pID);

        if (isset($_POST["saveEditedCaption"]) && isset($_POST["editedCaptionContent"])) {
            $newCaption = $_POST["editedCaptionContent"];
            PictureDAO::editPictureCaption($newCaption, self::$pID);
            header("Location: ./pictures-p" . self::$pID . "-u" . self::$UID);
        }

        if (isset($_POST["delete_comment"])){
            PictureDAO::removeComment($_POST["delete_comment"]);
            header("Location: ./pictures-p" . self::$pID . "-u" . self::$UID);
        }
    }

    public static function displayContent()
    {
        MainController::include();
        self::action();

        if (UserAuth::getInstance()->userIsLoggedOn()) {
            self::$UIDofUserLogged = UserDAO::getUserByMail(UserAuth::getInstance()->getMailLoggedOn())->getUserID();

            self::checkForm();
        } else {
            self::$UIDofUserLogged = intval("");

            self::checkForm();
        }

        include 'app/views/pictures.php';
    }

}








