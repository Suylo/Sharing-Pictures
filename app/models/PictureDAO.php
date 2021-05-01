<?php

namespace App\models;

use PDO;

class PictureDAO extends DAO
{

    public static function getAllPictures(): array
    {
        $myPicturesCollection = array();

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM photo");
        $query->execute();
        $pictures = $query->fetch(PDO::FETCH_ASSOC);

        while ($pictures) {
            $myPicturesCollection[$pictures["pictureID"]] = new Picture(
                $pictures["pictureID"],
                $pictures["caption"],
                $pictures["url"],
                $pictures["fk_userID"]
            );
            $pictures = $query->fetch(PDO::FETCH_ASSOC);
        }

        return $myPicturesCollection;
    }


    public static function getPicturesByUserID(int $userID)
    {
        $myPictures = array();

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM photo WHERE fk_userID = :userID");
        $query->bindValue(':userID', $userID, PDO::PARAM_INT);

        $query->execute();
        $pictures = $query->fetch(PDO::FETCH_ASSOC);

        while ($pictures) {
            $myPictures[$pictures["pictureID"]] = new Picture(
                $pictures["pictureID"],
                $pictures["caption"],
                $pictures["url"],
                $pictures["fk_userID"]
            );
            $pictures = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $myPictures;
    }

    public static function getPictureByPictureID(int $pictureID): Picture
    {

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM photo WHERE pictureID = :pictureID");
        $query->bindValue(':pictureID', $pictureID, PDO::PARAM_INT);

        $query->execute();
        $pictures = $query->fetch(PDO::FETCH_ASSOC);

        return new Picture(
            $pictures["pictureID"],
            $pictures["caption"],
            $pictures["url"],
            $pictures["fk_userID"],
        );
    }

    public static function addPictureIntoDB($pictureWording, $pictureURL, $userID)
    {
        DAO::init();
        $query = self::$connDb->prepare("INSERT INTO photo (caption, url, fk_userID) VALUES (:pWording, :pURL, :uID)");
        $query->bindValue(":pWording", $pictureWording, PDO::PARAM_STR);
        $query->bindValue(":pURL", $pictureURL, PDO::PARAM_STR);
        $query->bindValue(":uID", $userID, PDO::PARAM_STR);

        return $query->execute();
    }

    public static function removePictureFromDB($pictureID, $userID)
    {
        DAO::init();
        $query = self::$connDb->prepare("DELETE FROM photo WHERE pictureID = :pID AND fk_userID = :uID");
        $query->bindValue(":pID", $pictureID, PDO::PARAM_STR);
        $query->bindValue(":uID", $userID, PDO::PARAM_STR);

        return $query->execute();
    }

    public static function addFavPicture($userID, $pictureID)
    {
        DAO::init();
        $query = self::$connDb->prepare("INSERT INTO favorite (userID, pictureID) VALUES (:userID, :pictureID)");
        $query->bindValue(":userID", $userID, PDO::PARAM_STR);
        $query->bindValue(":pictureID", $pictureID, PDO::PARAM_STR);

        return $query->execute();
    }

    public static function removeFavPicture($userID, $pictureID)
    {
        DAO::init();
        $query = self::$connDb->prepare("DELETE FROM favorite WHERE userID = :userID AND pictureID = :pictureID");
        $query->bindValue(":userID", $userID, PDO::PARAM_STR);
        $query->bindValue(":pictureID", $pictureID, PDO::PARAM_STR);

        return $query->execute();
    }


    public static function getFavPictureByIDs($pictureID, $userID)
    {
        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM favorite WHERE pictureID=:pictureID AND userID=:userID");
        $query->bindValue(":pictureID", $pictureID, PDO::PARAM_STR);
        $query->bindValue(":userID", $userID, PDO::PARAM_STR);
        $query->execute();
        $row = $query->fetchAll();
        $numRow = count($row);

        return $numRow;
    }

    public static function countFavPictureByID($pictureID)
    {
        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM favorite where pictureID = :pictureID");
        $query->bindValue(":pictureID", $pictureID, PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetchAll();
        $count = count($row);

        return $count;

    }

    public static function getAllCommentsOfPictureByID($pictureID)
    {
        $ListOfPictures = array();

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM comment WHERE pictureID = :pictureID");
        $query->bindValue(":pictureID", $pictureID, PDO::PARAM_INT);
        $query->execute();
        $pictures = $query->fetch(PDO::FETCH_ASSOC);

        while ($pictures) {
            $ListOfPictures[] = $pictures;
            $pictures = $query->fetch(PDO::FETCH_ASSOC);
        }

        return $ListOfPictures;
    }


    public static function addComment($userID, $pictureID, $comment)
    {
        DAO::init();
        $query = self::$connDb->prepare("INSERT INTO comment (userID, pictureID, dateComment, Comment) VALUES (:userID, :pictureID, CURRENT_TIMESTAMP(), :comment)");
        $query->bindValue(":userID", $userID, PDO::PARAM_INT);
        $query->bindValue(":pictureID", $pictureID, PDO::PARAM_INT);
        $query->bindValue(":comment", $comment, PDO::PARAM_STR);

        return $query->execute();
    }

    public static function removeComment($userID, $pictureID)
    {
        DAO::init();
        $query = self::$connDb->prepare("DELETE FROM comment WHERE userID = :userID and pictureID = :pictureID");
        $query->bindValue(":userID", $userID, PDO::PARAM_INT);
        $query->bindValue(":pictureID", $pictureID, PDO::PARAM_INT);

        return $query->execute();
    }

    public static function editPictureCaption($newCaption, $pictureID)
    {
        DAO::init();
        $query = self::$connDb->prepare("UPDATE photo SET caption=:newCaption WHERE pictureID = :pictureID;");
        $query->bindValue(':newCaption', $newCaption, PDO::PARAM_STR);
        $query->bindValue(':pictureID', $pictureID, PDO::PARAM_STR);

        return $query->execute();
    }

    public static function getAllPicturesByWording(String $pictureWording): array
    {
        $myPicturesCollection = array();

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM photo WHERE caption LIKE :pWording");
        $query->bindValue(':pWording', "%".$pictureWording."%", PDO::PARAM_STR);
        $query->execute();
        $pictures = $query->fetch(PDO::FETCH_ASSOC);

        while ($pictures) {
            $myPicturesCollection[$pictures["pictureID"]] = new Picture(
                $pictures["pictureID"],
                $pictures["caption"],
                $pictures["url"],
                $pictures["fk_userID"]
            );
            $pictures = $query->fetch(PDO::FETCH_ASSOC);
        }

        return $myPicturesCollection;
    }

}

