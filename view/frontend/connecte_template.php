<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="/p3/public/css/style.css">
    </head>
    <body class="page_connecte">

        <header>
            <a href="http://localhost/p3/"><div class="logo_gbaf"><img src="\p3\public\images\15631755744257_LOGO_GBAF_ROUGE.png" alt=""></div></a>
            <!-- Faire: Bouton de déconnexion à droit en dessous du nom et prénom -->
        </header>

        <main>
            <?= $content ?>
        </main>

        <footer>
            <div class="liens_footer">
                <p>| <a href="#">Mentions légales</a> | <a href="#">Contact</a> |
                </p>
            </div>
        </footer>

    </body>
</html>
