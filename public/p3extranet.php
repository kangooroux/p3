<?php
require_once('controller/controller.php');

try {
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
            if (isset($_POST['userNameMdpReset'])) {
                reinitMdpQuestion(htmlspecialchars($_POST['userNameMdpReset']));
            }
            elseif (isset($_POST['reponseMdpReset'])) {
                reinitMdpReponse($_SESSION["userName"],htmlspecialchars($_POST['reponseMdpReset']));
            }
            elseif ((isset($_POST['nouveauMdp'])) && (isset($_POST['confirmNouveauMdp']))) {
                reinitMdpNouveauMdp($_SESSION["userName"], htmlspecialchars($_POST['nouveauMdp']), htmlspecialchars($_POST['confirmNouveauMdp']));
            }
            else {
                reinitMdp();
            }
        }
        elseif ($_GET['page'] == 'connexion') {
            if ((isset($_POST['identifiant'])) && (isset($_POST['motDePasse']))) {
                connexion(htmlspecialchars($_POST['identifiant']), htmlspecialchars($_POST['motDePasse']));
            }
        }
        else {
            echo "Cette page n'existe pas";
        }
    }
    else {
        page_defaut();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
