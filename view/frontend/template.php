<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/p3/public/css/style.css">
  </head>
  <body>

    <header>
      <a href="http://localhost/p3/public/index.php"><div class="logo_gbaf"><img src="\p3\public\images\15631755744257_LOGO_GBAF_ROUGE.png" alt=""></div></a>      
      <!-- Si la personne est connectée alors son nom-prénom apparaîtront ainsi que les boutons déconnecter et paramètres du compte-->
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
