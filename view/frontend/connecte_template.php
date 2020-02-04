<!-- Modèle de page header et footer pour la partie un fois connecté avec ses identifiants-->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="/p3/public/css/style.css">
    </head>
    <body class="page_connecte">

        <header>
            <div class="logo_gbaf"><a href="http://localhost/p3/"><img src="/p3/public/images/15631755744257_LOGO_GBAF_ROUGE.png" alt=""></a></div>
            <div class="conteneur_utilisateur">
                <p><?php echo strtoupper($_SESSION['nom']) . " " . $_SESSION['prenom']?></p>
                <nav>
                    <div class="conteneur_nav"><a href="?page=paramcompte"><p>Paramètres du compte</p></a></div>
                    <div class="conteneur_nav"><form method="post" action="index.php"><input type="submit" name="deconnexion" value="Déconnexion" /></form></div>
                </nav>
            </div>
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
