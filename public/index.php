<?php
require('../controller/frontend.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['identifiant']) && ($_POST['mdp'])) {
        // page connecté
      }
      elseif (isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['userName']) && ($_POST['mdp']) && ($_POST['questionSecrete']) && ($_POST['reponseSecrete'])) {
        inscriptionReussie();
      }
      elseif (isset($_POST['userNameMdpReset'])) {
        requeteMdpQuestion();
      }
      elseif (isset($_POST['questionMdpReset'])) {
        requeteMdpNouveauMdp();
      }
      elseif (isset($_POST['nouveauMdp'])) {
        nouveauMdp();
      }
      else {
        throw new Exception('Erreur');
      }
    }
    elseif (isset($_GET['page'])) {
        if ($_GET['page'] == 'inscription') {
            inscription();
        }
        elseif ($_GET['page'] == 'oublimdp') {
            oublimdp();
        }
        else {
          throw new Exception('Aucune page envoyé');
        }
    }
    elseif (isset($_POST['submit'])) {
        inscriptionReussie();
    }
    else {
        connexion();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('../view/errorView.php');
}
