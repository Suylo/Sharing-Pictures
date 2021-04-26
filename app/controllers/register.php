<?php

namespace App\controllers;

use App\models\UserDAO;

class register extends mainController
{


    public static function displayContent()
    {
        mainController::include();

        $isRegistered = false;
        $message = "Aucun des champs n'a été renseigné";

        if (isset($_POST["firstName"]) &&
            isset($_POST["lastName"]) &&
            isset($_POST["userEmail"]) &&
            isset($_POST["userPassword"])) {

            if ($_POST["firstName"] != "" && $_POST["lastName"] != "" && $_POST["userEmail"] != "" && $_POST["userPassword"] != "") {

                // Variables setup for more facility
                $regFirstName = $_POST["firstName"];
                $regLastName = $_POST["lastName"];
                $regEmail = $_POST["userEmail"];
                $regPassword = $_POST["userPassword"];

                // Use function to register in DB, boolean function:
                $isItReg = UserDAO::userRegister($regFirstName, $regLastName, $regEmail, $regPassword);
                $_SESSION["userEmail"] = $regEmail;
                $_SESSION["userPassword"] = $regPassword;
                header("Location: ?q=home");
                if ($isItReg == true) {
                    $isRegistered = true;
                } else {
                    $message = "Vous n'avez pas pu être enregistré, veuillez réessayer.";
                }
            }

        } else {
            $message = "Tous les champs n'ont pas été renseignés. Veuillez les compléter.";
        }

        include 'app/views/authRegister.php';
    }

}





