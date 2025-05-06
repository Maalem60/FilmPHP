

<h1>Détail du film</h1>

<?php
// Je prépare le chemin vers l'image d'affiche du film
$cheminAffiche = "public/img/" . $film["affiche"];
$backgroundStyle = "";

// Je vérifie si le nom de l'affiche n'est pas vide et si le fichier existe
if (!empty($film["affiche"]) && file_exists($cheminAffiche)) {
    // Si c'est bon, je crée un style CSS pour mettre l'image en fond
    $backgroundStyle = "style=\"background: url('$cheminAffiche') no-repeat center center fixed; background-size: cover;\"";
}
?>

<!-- J'affiche le fond avec l'affiche -->
<div <?= $backgroundStyle ?>>
    <!-- Je mets un fond noir semi-transparent pour bien voir le texte -->
    <div style="background-color: rgba(0, 0, 0, 0.75); color: white; padding: 2rem; min-height: 100vh;">

        <!-- Je vérifie si les infos du film existent -->
        <?php if ($film): ?>
            <!-- Je montre le titre du film -->
            <h2><?= htmlspecialchars($film["title"]) ?></h2>

            <!-- Je montre la durée -->
            <p><strong>Durée :</strong> <?= htmlspecialchars($film["duree"]) ?> minutes</p>
            
            <!-- Je montre l'année de sortie -->
            <p><strong>Année de sortie :</strong> <?= htmlspecialchars($film["anneeSortie"]) ?></p>
            
            <!-- Je montre la note du film -->
            <p><strong>Note :</strong> <?= htmlspecialchars($film["note"]) ?>/10</p>
            
            <!-- Je montre le nom et prénom du réalisateur -->
            <p><strong>Réalisateur :</strong> <?= htmlspecialchars($film["prenom_realisateur"]) ?> <?= htmlspecialchars($film["nom_realisateur"]) ?></p>
            
            <!-- Je vérifie si on a des infos sur les acteurs -->
            <?php if (!empty($casting)): ?>
                <h3>Casting</h3>
                <ul>
                    <!-- Je parcours tous les acteurs du casting -->
                    <?php foreach ($casting as $cast): ?>
                        <!-- J'affiche le nom, prénom et rôle du personnage joué -->
                        <li><?= htmlspecialchars($cast["acteur_nom"]) ?> <?= htmlspecialchars($cast["acteur_prenom"]) ?> dans le rôle de <?= htmlspecialchars($cast["role"]) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <!-- Message si aucun acteur n'est renseigné -->
                <p>Aucun acteur renseigné pour ce film.</p>
            <?php endif; ?>
        <?php else: ?>
            <!-- Message si le film n'existe pas -->
            <p>Film introuvable.</p>
        <?php endif; ?>

        <!-- Lien pour retourner à la page d'accueil -->
        <a href="index.php" class="btn-retour">← Retour à l'accueil</a>
    </div>
</div>
