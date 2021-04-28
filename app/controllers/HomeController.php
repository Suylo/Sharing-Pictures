<?php

namespace App\controllers;

class HomeController extends MainController
{

    public static function displayContent()
    {
        MainController::include();
        include 'app/views/home.php';
    }

}

