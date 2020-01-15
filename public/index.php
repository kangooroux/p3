<?php
require('../controller/frontend.php');

try { // On essaie de faire des choses
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['userName']) && ($_POST['mdp']) && ($_POST['questionSecrete']) && ($_POST['reponseSecrete'])) {
        inscriptionReussie();
      }
      elseif (isset($_POST['userNameMdpReset'])) {
        // code...
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
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    elseif (isset($_POST['submit'])) {
        inscriptionReussie();
    }
    else {
        connexion();
        throw new Exception('Aucun identifiant de billet envoyé');
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('../view/errorView.php');
}
