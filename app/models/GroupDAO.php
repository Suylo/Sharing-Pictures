<?php


namespace App\models;


use PDO;

class GroupDAO extends DAO
{

    public static function getAllGroups(): array
    {
        $myGroupsCollection = array();

        DAO::init();
        $query = self::$connDb->prepare("SELECT * FROM `group`");
        $query->execute();
        $groups = $query->fetch(PDO::FETCH_ASSOC);
        while ($groups) {
            $usersBelongTo = array();
            $query = self::$connDb->prepare("SELECT * FROM belongTo WHERE groupID = :groupID");
            $query->bindValue(':groupID', $groups["groupID"], PDO::PARAM_INT);
            $query->execute();
            $users = $query->fetch(PDO::FETCH_ASSOC);

            while ($users) {
                $usersBelongTo[$users["userID"]] = UserDAO::getUserByID($users["userID"]);
                $users = $query->fetch(PDO::FETCH_ASSOC);
            }

            $myGroupsCollection[] = new Group(
                $groups["groupID"],
                $groups["groupName"],
                $groups["groupDesc"],
                $usersBelongTo
            );
            $groups = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $myGroupsCollection;
    }
}