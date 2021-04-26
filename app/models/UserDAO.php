<?php


namespace App\models;

use PDO;

class UserDAO extends DAO
{

    public static function getAllUser(): array
    {
        $myUserCollection = array();

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM user");
        $query->execute();
        $users = $query->fetch(PDO::FETCH_ASSOC);

        while ($users) {
            $myUserCollection[$users["userID"]] = new User(
                $users["userID"],
                $users["firstName"],
                $users["lastName"],
                $users["Address"],
                $users["PostalCode"],
                $users["BirthDate"],
                $users["Email"],
                $users["Password"],
                $users["creationDate"],
                PictureDAO::getPicturesByUserID($users["userID"])
            );
            $users = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $myUserCollection;
    }

    public static function getUserByMail(string $Email): User
    {
        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM user WHERE Email = :Email");
        $query->bindValue(':Email', $Email, PDO::PARAM_STR);
        $query->execute();

        $users = $query->fetch(PDO::FETCH_ASSOC);

        $myUserByMail = new User(
            $users["userID"],
            $users["firstName"],
            $users["lastName"],
            $users["Address"],
            $users["PostalCode"],
            $users["BirthDate"],
            $users["Email"],
            $users["Password"],
            $users["creationDate"],
            PictureDAO::getPicturesByUserID(intval($users["userID"]))
        );

        return $myUserByMail;
    }

    public static function getUserByID(int $ID): User
    {
        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM user WHERE userID = :userID");
        $query->bindValue(':userID', $ID, PDO::PARAM_INT);
        $query->execute();
        $users = $query->fetch(PDO::FETCH_ASSOC);

        return new User(
            $users["userID"],
            $users["firstName"],
            $users["lastName"],
            $users["Address"],
            $users["PostalCode"],
            $users["BirthDate"],
            $users["Email"],
            $users["Password"],
            $users["creationDate"],
            PictureDAO::getPicturesByUserID(intval($users["userID"]))
        );
    }

    public static function userRegister(string $firstName, string $lastName, string $userEmail, string $userPassword)
    {
        DAO::init();
        $query = self::$connDb->prepare(
            "insert into user (firstName, lastName, Address, PostalCode, BirthDate, Email, Password, creationDate)
            values(:firstName, :lastName, null, null, null, :userEmail, :userPassword, now())"
        );
        $query->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
        $query->bindValue(':userPassword', $userPassword, PDO::PARAM_STR);

        $newUser = $query->execute();

        return $newUser;
    }


    public static function getPictureByUserID(int $userID): array
    {
        $myPicturesByUID = array();

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM photo WHERE fk_userID = :userID");
        $query->bindValue(':userID', $userID, PDO::PARAM_INT);

        $query->execute();
        $pictures = $query->fetch(PDO::FETCH_ASSOC);

        while ($pictures) {
            $myPicturesByUID[$pictures["pictureID"]] = new Picture(
                $pictures["pictureID"],
                $pictures["caption"],
                $pictures["url"],
                $pictures["fk_userID"]
            );
            $pictures = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $myPicturesByUID;
    }

    // = 1

    public static function getPicturesFavByUserID(int $userID): array
    {
        $picturesLiked = array();

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM photo JOIN favorite f ON photo.pictureID = f.pictureID WHERE f.userID = :userID");
        $query->bindValue(':userID', $userID, PDO::PARAM_INT);

        $query->execute();
        $pictures = $query->fetch(PDO::FETCH_ASSOC);

        while ($pictures) {
            $picturesLiked[$pictures["pictureID"]] = new Picture(
                $pictures["pictureID"],
                $pictures["caption"],
                $pictures["url"],
                $pictures["fk_userID"]
            );
            $pictures = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $picturesLiked;
    }

    public static function editUserInfos($newFirstname, $newLastname, $newAddress, $newPC, $newBD, $userID)
    {
        DAO::init();
        $query = self::$connDb->prepare("UPDATE user SET firstName=:newFirstname, 
                              lastName=:newLastname, 
                              Address=:newAddress, 
                              PostalCode=:newPC,
                              BirthDate=:newBD WHERE userID = :userID;");
        $query->bindValue(':newFirstname', $newFirstname, PDO::PARAM_STR);
        $query->bindValue(':newLastname', $newLastname, PDO::PARAM_STR);
        $query->bindValue(':newAddress', $newAddress, PDO::PARAM_STR);
        $query->bindValue(':newPC', $newPC, PDO::PARAM_STR);
        $query->bindValue(':newBD', $newBD, PDO::PARAM_STR);
        $query->bindValue(':userID', $userID, PDO::PARAM_STR);

        return $query->execute();
    }

    public static function removeUserFromDB($userID)
    {
        DAO::init();
        $query = self::$connDb->prepare("DELETE user, photo FROM user INNER JOIN photo ON user.userID = photo.fk_userID WHERE fk_userID = :userID");
        $query->bindValue(':userID', $userID, PDO::PARAM_STR);

        return $query->execute();
    }


}

// TEST PROGRAM :
