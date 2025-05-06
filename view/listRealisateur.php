<!-- Vue pour afficher les réalisateurs -->
<!-- Aucune sortie n'est envoyée en attendant (mise en memoire tampon, jusqu'au script ou supprime) ?>-->

<?php ob_start(); ?>
<p class="uk-label uk-label-warning">Il y a <?=$requete->rowCount() ?> Realisateurs</p>
<h1>Liste des Réalisateurs</h1>
 



<!-- Début du tableau affichant les realisateurs -->
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($realisateurs as $realisateur): ?>
            <tr>
                <td><?php echo htmlspecialchars($realisateur['nom']); ?></td>
                <td><?php echo htmlspecialchars($realisateur['prenom']); ?></td>
                <td><?php echo htmlspecialchars($realisateur['sexe']); ?></td>
                <td><?php echo htmlspecialchars($realisateur['dateNaissance']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
