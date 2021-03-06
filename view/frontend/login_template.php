<!-- Modèle de page header et footer pour la partie déconnecté (Page connexion, page demande nouveau mot de passe et page d'inscription)-->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="/p3/public/css/style.css">
    </head>
    <body class="page_connexion">

        <header>
            <a href="http://localhost/p3/"><div class="logo_gbaf"><img src="/p3/public/images/15631755744257_LOGO_GBAF_ROUGE.png" alt=""></div></a>
        </header>

        <main>
            <?= $content ?>
        </main>

        <footer>
            <div class="liens_footer">
                <p>| <a href="?page=mentionslegales">Mentions légales</a> | <a href="?page=contact">Contact</a> |
                </p>
            </div>
        </footer>

    </body>
</html>
