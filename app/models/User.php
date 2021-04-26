<?php

namespace App\models;


class User
{

    /**
     * @var int - User ID - IMPORTANT in order to identificate user.
     */
    private $userID;

    private $picturesCollection;

    /**
     * @vars - Identification IRL user
     */
    private $firstName;
    private $lastName;
    private $address;
    private $postalCode;
    private $birthDate;

    /**
     * @vars - Identification Virtual user
     */
    private $userEmail;
    private $userPasswd;
    private $creationDate;


    /**
     * User constructor.
     * @param $UserID - ID of user which allows to identify user
     * @param $FirstName - First name, e.g. "John"
     * @param $LastName - Last name, e.g. "Doe"
     * @param $Address - The location of user, e.g. "69 rue de la République"
     * @param $PostalCode - Postal code e.g. "75000"
     * @param $BirthDate - Birth date of user, e.g. "2000-01-01"
     * @param $UserEmail - Email, e.g. "example.1@gmail.com"
     * @param $UserPasswd - Password of user, it encrypted
     * @param $CreationDate - Creation date of the account of user, e.g. "2021-04-08"
     */
    public function __construct($UserID, $FirstName, $LastName, $Address, $PostalCode, $BirthDate, $UserEmail, $UserPasswd, $CreationDate, $picturesCollection)
    {
        $this->userID = $UserID;
        $this->firstName = $FirstName;
        $this->lastName = $LastName;
        $this->address = $Address;
        $this->postalCode = $PostalCode;
        $this->birthDate = $BirthDate;
        $this->userEmail = $UserEmail;
        $this->userPasswd = $UserPasswd;
        $this->creationDate = $CreationDate;
        $this->picturesCollection = $picturesCollection;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return String
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return String
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return String
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return String
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return String
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return String
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @return String
     */
    public function getUserPasswd()
    {
        return $this->userPasswd;
    }

    /**
     * @return String
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return mixed
     */
    public function getPicturesCollection()
    {
        return $this->picturesCollection;
    }


}