<?php


namespace App\controllers;

use App\models\PictureDAO;
use App\models\UserAuth;
use App\models\UserDAO;

$infos = UserDAO::getUserByMail(UserAuth::getInstance()->getMailLoggedOn());
$firstname = $infos->getFirstName();
$userID = $infos->getUserID();
