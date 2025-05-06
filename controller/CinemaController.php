<?php
namespace Controller; //?JE N'AI PAS TRES BIEN SAISI L'UTILITE DE NAMESPACE. A PART QU'IL PERMET D'AJOUTER DES NOMS DE CLASSE SANS CONFUSION. //

use Model\Connect; // utilisation de la classe connect dans Model//

class CinemaController { // ouverture du "moule"(class) CinemaController, dans lequel nous allons intéger des methodes, des objets //
  
   
    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
    
        // 1. Récupérer les infos du film
        $requeteFilm = $pdo->prepare("SELECT f.id_film, f.title, f.duree, f.anneeSortie, f.note, f.affiche,
                                      p.nom AS nom_realisateur, p.prenom AS prenom_realisateur
                                      FROM films f
                                      INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
                                      INNER JOIN personne p ON r.id_personne = p.id_personne
                                      WHERE f.id_film = :id");
        $requeteFilm->execute(["id" => $id]);
        $film = $requeteFilm->fetch();
    
        // 2. Récupérer le casting (acteur + personnage joué)
        $requeteCasting = $pdo->prepare("SELECT per.nom AS acteur_nom, per.prenom AS acteur_prenom, pj.attribution AS role
                                        FROM casting c
                                        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
                                        INNER JOIN personne per ON a.id_personne = per.id_personne
                                        INNER JOIN personnage pj ON c.id_personnage = pj.id_personnage
                                        WHERE c.id_film = :id");
        $requeteCasting->execute(["id" => $id]);
        $casting = $requeteCasting->fetchAll();
    
        // 3. Charger la vue
        require "view/detailFilm.php";
    }
    
    

    // ... les autres méthodes

    // Méthode permettant de récupérer et d'afficher la liste des films//
    public function listFilms() {
        // Connexion à la base de données via seConnecter de la classe Connect//
        $pdo = Connect::seConnecter();
        
        // Exécution d'une requête SQL pour récupérer les titres et les années de sortie des films//
        $requete = $pdo->query("
        SELECT id_film, title, anneeSortie, duree, synopsis, note, affiche FROM films");
       

        // Inclusion du fichier de vue chargé d'afficher les films récupérés//
        require "view/listFilms.php";
    }
    public function listActeursAvecFilms() {
        // Connexion à la base de données
        $pdo = Connect::seConnecter();
    
        // Exécution de la requête SQL pour récupérer les acteurs et les films dans lesquels ils jouent
        $requete = $pdo->query("
            SELECT p.nom, p.prenom, p.sexe, p.dateNaissance, GROUP_CONCAT(f.title ORDER BY f.title) AS films
            FROM personne p
            INNER JOIN acteur a ON p.id_personne = a.id_personne
            INNER JOIN casting c ON a.id_acteur = c.id_acteur
            INNER JOIN films f ON c.id_film = f.id_film
            GROUP BY a.id_acteur
        ");
    
        // Récupérer les résultats sous forme de tableau associatif
        $acteurs = $requete->fetchAll();
    
        // Passer les données à la vue
        require "view/listActeurs.php";
    }
    
     // Méthode pour lister les acteurs avec jointure
     public function listActeurs() {
        // Connexion à la base de données
        $pdo = Connect::seConnecter();

        // Exécution de la requête SQL pour récupérer les informations des acteurs via une jointure
        $requete = $pdo->query("
            SELECT p.nom, p.prenom, p.sexe, p.dateNaissance 
            FROM personne p
            INNER JOIN acteur a ON p.id_personne = a.id_personne");

        // Récupérer les résultats sous forme de tableau associatif
        $acteurs = $requete->fetchAll();

        // Passer les données à la vue
        require "view/listActeur.php";
    }

    // Méthode pour lister les réalisateurs avec jointure
    public function listRealisateurs() {
        // Connexion à la base de données
        $pdo = Connect::seConnecter();

        // Exécution de la requête SQL pour récupérer les informations des réalisateurs via une jointure
        $requete = $pdo->query("
            SELECT p.nom, p.prenom, p.sexe, p.dateNaissance 
            FROM personne p
            INNER JOIN realisateur r ON p.id_personne = r.id_personne");

        // Récupérer les résultats sous forme de tableau associatif
        $realisateurs = $requete->fetchAll();

        // Passer les données à la vue
        require "view/listRealisateur.php";
    }
}


?>
