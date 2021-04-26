<?php


use App\controllers\mainController;

include "vendor/autoload.php";

include 'app/controllers/mainController.php';


if (isset($_GET["q"])) {
    $q = $_GET["q"];
} else {
    $q = "home";
}

mainController::router($q);
