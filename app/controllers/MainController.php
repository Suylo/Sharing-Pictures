<?php

namespace App\controllers;

use App\models\UserAuth;

class MainController
{

    public static string $title;

    public static function router($q)
    {
        switch ($q) {
            case "gallery":
                self::$title = "Galerie";
                GalleryController::displayContent();
                break;
            case "home":
                self::$title = "Page d'accueil !";
                HomeController::displayContent();
                break;
            case "login":
                self::$title = "Page de connexion";
                Login::displayContent();
                break;
            case "register":
                self::$title = "Enregistrez-vous !";
                Register::displayContent();
                break;
            case "detail":
                self::$title = "Détail de photo";
                PicturesController::displayContent();
                break;
            case "profile":
                self::$title = "Profil utilisateur";
                ProfileController::displayContent();
                break;
            case "logout":
                UserAuth::getInstance()->userLogout();
                break;
            case "settings":
                self::$title = "Configuration des paramètres";
                Settings::displayContent();
                break;
            case "fav":
                fav::content();
                break;
            default:
                self::$title = "Page d'accueil !";
                HomeController::displayContent();
        }
    }

    public static function include()
    {
        include 'assets/includes/head.php';
        include 'assets/includes/header.php';
    }
}