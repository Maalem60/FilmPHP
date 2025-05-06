<!-- Vue pour afficher les acteurs -->
<?php ob_start(); // Aucune sortie n'est envoyée en attendant (mise en memoire tampon, jusqu'au script ou supprime) 
$titre = "Acteurs";
$titre_secondaire ="Liste des Acteurs";?>
 <!-- Début du tableau affichant les acteurs -->
<table class="uk-table uk-table-striped">
<h1>Liste des Acteurs</h1>

    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($acteurs as $acteur): ?>
            <tr>
                <td><?php echo htmlspecialchars($acteur['nom']); ?></td>
                <td><?php echo htmlspecialchars($acteur['prenom']); ?></td>
                <td><?php echo htmlspecialchars($acteur['sexe']); ?></td>
                <td><?php echo htmlspecialchars($acteur['dateNaissance']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
