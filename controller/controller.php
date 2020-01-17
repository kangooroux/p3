<?php

require_once('../model/InscriptionManager.php');

// Va chercher la page de Connexion
function connexion()
{
    require('../view/frontend/page_connexion.php');
}

function inscription()
{
    require('../view/frontend/page_inscription.php');
}

function reinitMdp()
{
    require('../view/frontend/page_reinit_mdp.php');
}

function nouvelUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS)
{
    $utilisateurManager = new InscriptionManager();
    $verif = $utilisateurManager->verifIdentifiant($userName);
    if ($verif['user_name'] == $userName) {
        $doublon = '';
        require('../view/frontend/page_inscription.php');
    }
    else {
        $nouvelleEntree = $utilisateurManager->ajoutUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS);
        if ($nouvelleEntree === false) {
            echo 'Impossible d\'ajouter le nouvel utilisateur !';
        }
        else {
            echo "GG WP";
        }
    }
}
