<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/controller.php";
if (empty($_GET['page'])) {
    require "views/accueil.views.php";
} else {
    $url = explode("/", $_GET['page']);
    switch ($url[0]) {
        case "accueil":
            require "views/accueil.views.php";
            break;
        case "users":
            $usersController = new UsersController();
            if (empty($url[1])) {
                $usersController->afficherUsers();
            } else if ($url[1] === "voir") {
                $usersController->afficherUser($url[2]);
            } else if ($url[1] === "ajouter") {
                $usersController->ajoutUsers();
            } else if ($url[1] === "ajoutValidation") {
                $usersController->ajoutUsersValidation();
            } else if ($url[1] === "modifier") {
                $usersController->modificationUsersValidation($url[2]);
            } else if ($url[1] === "supprimer") {
                $usersController->supprimerUsers($url[2]);
            }
            break;
        case "computers":
            $computersController = new ComputersController();
            if (empty($url[1])) {
                $computersController->afficherComputers();
            } else if ($url[1] === "voir") {
                $computersController->afficherComputer($url[2]);
            } else if ($url[1] === "ajouter") {
                $computersController->ajoutComputers();
            } else if ($url[1] === "ajoutValidation") {
                $computersController->ajoutComputersValidation();
            } else if ($url[1] === "modifier") {
                $computersController->modificationComputersValidation($url[2]);
            } else if ($url[1] === "supprimer") {
                $computersController->supprimerComputers($url[2]);
            }
            break;
    }
}
