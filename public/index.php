<?php
require_once __DIR__ . '../controller/FilmController.php';

    $controller = new \Controller\FilmController();
    $controller->showFilms();
    
  ?>