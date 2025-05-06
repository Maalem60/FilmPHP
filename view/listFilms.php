
    <?php ob_start(); // Aucune sortie n'est envoyée en attendant (mise en memoire tampon, jusqu'au script ou supprime) ?>
    
<!-- Affichage du nombre de films retournés par la requête -->
    <p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films</p>

<!-- Début du tableau affichant les films -->
    <table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
            <th>DUREE</th>
            <th>SYNOPSIS</th>
            <th>NOTE</th>
            <th>AFFICHE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Parcours des résultats retournés par la requête SQL
        foreach($requete->fetchAll() as $film) { ?>
        
 

<tr>
    <td>
        <a href="index.php?action=detailFilm&id=<?= $film['id_film'] ?>">
            <?= htmlspecialchars($film["title"]) ?>
        </a>
    </td>
    <td><?= htmlspecialchars($film["anneeSortie"]) ?></td>
    <td><?= htmlspecialchars($film["duree"]) ?> min</td>
    <td><?= htmlspecialchars($film["synopsis"]) ?></td>
    <td><?= htmlspecialchars($film["note"]) ?>/10</td>
    <td>

    <?php
    $cheminAffiche = 'public/img/' . $film["affiche"];
    if (!empty($film["affiche"]) && file_exists($cheminAffiche)) : ?>
        <img src="<?= $cheminAffiche ?>" alt="Affiche du film <?= htmlspecialchars($film['title']) ?>" style="max-width:100px;">
<?php else : ?>
        <em>Pas d'affiche</em>
<?php endif; ?>

    </td>
</tr>

        <?php } ?>
    </tbody>
</table>

<?php
// Définition des variables de titre à utiliser dans le template principal
$titre = "Liste des films";
$titre_secondaire = "Liste des films";

// Récupération du contenu mis en tampon et nettoyage du tampon de sortie
$contenu = ob_get_clean();

// Inclusion du fichier de template principal
require "view/template.php";
?>
</body>