<?php

use Controller\CinemaController;

// Autoload pour charger automatiquement les classes
spl_autoload_register(function($class_name) {
    include $class_name . '.php';
});

// Création d'une instance du contrôleur
$ctrlCinema = new CinemaController();

// Gestion des routes
if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "listFilms": 
            $ctrlCinema->listFilms();
            break;
        case "listActeurs": 
            $ctrlCinema->listActeurs(); 
            break;
        case "listRealisateurs": 
            $ctrlCinema->listRealisateurs(); 
            break;
        case "detailFilm":
                if (isset($_GET["id"])) {
                    $ctrlCinema->detailFilm((int)$_GET["id"]);
                } else {
                    echo "ID du film manquant.";
                }
            break;
        default:
            // Action par défaut ou page 404
            $ctrlCinema->listFilms();
            break;
    }
} else {
    // Si aucune action n'est spécifiée, afficher la liste des films par défaut
    $ctrlCinema->listFilms();
}
?>