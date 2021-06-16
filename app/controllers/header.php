<?php


namespace App\controllers;

use App\models\UserAuth;
use App\models\UserDAO;

$infos = UserDAO::getUserByMail(UserAuth::getMailLoggedOn());
$firstname = $infos->getFirstName();
$userID = $infos->getUserID();
