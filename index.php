<?php


use App\controllers\MainController;

include "vendor/autoload.php";

include 'app/controllers/MainController.php';


if (isset($_GET["q"])) {
    $q = $_GET["q"];
} else {
    $q = "home";
}

MainController::router($q);
