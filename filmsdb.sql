DROP DATABASE IF EXISTS filmsbd;
CREATE DATABASE filmsbd;
USE filmsbd;

CREATE TABLE personne (
    id_personne INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    sexe VARCHAR(50),
    dateNaissance DATE
);

CREATE TABLE realisateur (
    id_realisateur INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT,
    FOREIGN KEY (id_personne) REFERENCES personne(id_personne)
);

CREATE TABLE acteur (
    id_acteur INT PRIMARY KEY AUTO_INCREMENT,
    id_personne INT,
    FOREIGN KEY (id_personne) REFERENCES personne(id_personne)
);

CREATE TABLE genre (
    id_genre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    libelle VARCHAR(255) NOT NULL
);

CREATE TABLE Films (
    id_film INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    anneeSortie INT NOT NULL,
    duree INT NOT NULL,
    synopsis TEXT NOT NULL,
    note INT NOT NULL,
    affiche VARCHAR(255) NOT NULL,
    id_realisateur INT,
    FOREIGN KEY (id_realisateur) REFERENCES realisateur(id_realisateur)
);

CREATE TABLE personnage (
    id_personnage INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    attribution VARCHAR(255)
);

CREATE TABLE casting (
    id_film INT NOT NULL,
    id_acteur INT NOT NULL,
    id_personnage INT NOT NULL,
    PRIMARY KEY (id_film, id_acteur, id_personnage),
    FOREIGN KEY (id_film) REFERENCES Films(id_film),
    FOREIGN KEY (id_acteur) REFERENCES acteur(id_acteur),
    FOREIGN KEY (id_personnage) REFERENCES personnage(id_personnage)
);

CREATE TABLE film_genre (
    id_film INT NOT NULL,
    id_genre INT NOT NULL,
    PRIMARY KEY (id_film, id_genre),
    FOREIGN KEY (id_film) REFERENCES Films(id_film),
    FOREIGN KEY (id_genre) REFERENCES genre(id_genre)
);
