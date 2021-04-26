<?php

namespace App\models;

class Group
{

    private int $groupID;
    private string $groupName;
    private string $groupWording;
    private array $myUsers = array();


    /**
     * Group constructor.
     * @param int $GroupID - ID to identify group
     * @param String $GroupName - Name of the group
     * @param String $GroupWording - Describe the group
     */
    public function __construct(int $GroupID, string $GroupName, string $GroupWording, array $myUsers)
    {
        $this->groupID = $GroupID;
        $this->groupName = $GroupName;
        $this->groupWording = $GroupWording;
        $this->myUsers = $myUsers;
    }

    public function addUserToGroup(User $user)
    {
        $this->myUsers[] = $user;
    }

    public function removeUserFromGroup(User $user)
    {

    }

}