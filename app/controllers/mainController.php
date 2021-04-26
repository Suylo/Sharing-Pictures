<?php

namespace App\controllers;

use App\models\UserAuth;

class mainController
{

    public static string $title;

    public static function router($q)
    {
        switch ($q) {
            case "gallery":
                self::$title = "Galerie";
                galleryController::displayContent();
                break;
            case "home":
                self::$title = "Page d'accueil !";
                homeController::displayContent();
                break;
            case "login":
                self::$title = "Page de connexion";
                login::displayContent();
                break;
            case "register":
                self::$title = "Enregistrez-vous !";
                register::displayContent();
                break;
            case "detail":
                self::$title = "Détail de photo";
                picturesController::displayContent();
                break;
            case "profile":
                self::$title = "Profil utilisateur";
                profileController::displayContent();
                break;
            case "logout":
                UserAuth::getInstance()->userLogout();
                break;
            case "settings":
                self::$title = "Configuration des paramètres";
                settings::displayContent();
                break;
            case "fav":
                fav::content();
                break;
            default:
                self::$title = "Page d'accueil !";
                homeController::displayContent();
        }
    }

    public static function include()
    {
        include 'assets/includes/head.php';
        include 'assets/includes/header.php';
    }
}