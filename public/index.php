<?php
require('../controller/controller.php');

try {
    // if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    //   if (isset($_POST['identifiant']) && isset($_POST['mdp'])) {
    //       // page connecté
    //   }
    //   elseif (isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['userName']) && ($_POST['mdp']) && ($_POST['questionSecrete']) && ($_POST['reponseSecrete'])) {
    //       ajoutUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['userName'], $_POST['mdp'], $_POST['questionSecrete'], $_POST['reponseSecrete']);
    //   }
    //   elseif (isset($_POST['userNameMdpReset']) || isset($_POST['questionMdpReset']) || isset($_POST['nouveauMdp'])) {
    //       reinitMdp();
    //   }
    //   else {
    //       connexion();
    //   }
    // }
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'inscription') {
            if (isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['userName']) && ($_POST['mdp']) && ($_POST['confirmMdp']) && ($_POST['questionSecrete']) && ($_POST['reponseSecrete'])) {
              nouvelUtilisateur(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['userName']), htmlspecialchars($_POST['mdp']), htmlspecialchars($_POST['confirmMdp']), htmlspecialchars($_POST['questionSecrete']), htmlspecialchars($_POST['reponseSecrete']));
            }
            else {
              inscription();
            }
        }
        elseif ($_GET['page'] == 'oublimdp') {
            reinitMdp();
        }
        else {
            echo "Cette page n'éxiste pas";
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
