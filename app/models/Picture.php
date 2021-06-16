<?php

namespace App\models;

class Picture
{

    private int $pictureID;
    private string $pictureWording;
    private string $pictureURL;
    private string $userID;
    private $datePicture;

    /**
     * Picture constructor.
     * @param int $PictureID - ID of picture which allows to identify the picture in the db
     * @param String $PictureWording - Medium text which allows to describe the picture
     * @param String $PictureURL - The URL of picture e.g. "img/imgName.jpg"
     * @param int $UserID - USER ID for references to user/pictures
     */
    public function __construct(int $PictureID, string $PictureWording, string $PictureURL, int $UserID, $DatePicture)
    {
        $this->pictureID = $PictureID;
        $this->pictureWording = $PictureWording;
        $this->pictureURL = $PictureURL;
        $this->userID = $UserID;
        $this->datePicture = $DatePicture;
    }

    /**
     * @return int
     */
    public function getPictureID(): int
    {
        return $this->pictureID;
    }

    /**
     * @return String
     */
    public function getPictureWording(): string
    {
        return $this->pictureWording;
    }

    /**
     * @return String
     */
    public function getPictureURL(): string
    {
        return $this->pictureURL;
    }

    /**
     * @return int|string
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return String
     */
    public function getDatePicture(): string
    {
        return $this->datePicture;
    }


}