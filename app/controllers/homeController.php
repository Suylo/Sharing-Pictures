<?php

namespace App\controllers;

class homeController extends mainController
{

    public static function displayContent()
    {
        mainController::include();
        include 'app/views/home.php';
    }

}

