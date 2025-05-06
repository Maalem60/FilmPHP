<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/css/uikit.min.css" />

   <link rel="stylesheet" href="public/CSS/style.css" class="css">
    <title><?= $titre ?></title>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/js/uikit-icons.min.js"></script>
</head>

<body>
    <!-- utilisation de ULKIT (uk) pour les barres de nav et le container -->
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <a href="#" class="uk-navbar-item uk-logo">Accueil</a>
        </div>
    </nav>

        <div id="wrapper" class="uk-container uk-container-expand">
            <main>
                <div id="contenu">
                    <h1 class="uk-heading-divider"> Cinema</h1>
                    <h2 class="uk-heading-bullet"><?= $titre_secondaire ?></h2>
                    <?= $contenu ?>
                </div>
            </main>

    </div>
</body>
</html>