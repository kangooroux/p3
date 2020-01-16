<?php
require('../controller/frontend.php');

try {
    if (($_SERVER["REQUEST_METHOD"] == "POST") || isset($_GET['page'])) {
      if (isset($_POST['identifiant']) && isset($_POST['mdp'])) {
        // page connecté
      }
      else {
          connexion();
      }
    }
    else {
        connexion();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('../view/errorView.php');
}
