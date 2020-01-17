<?php

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

function ajoutUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS)
{
    $inscriptionManager = new \p3\Model\InscriptionManager();

    $champs = $inscriptionManager->postComment($nom, $prenom, $userName, $mdp, $questionS, $reponseS);

    if ($champs === false) {
        throw new Exception('Impossible d\'ajouter le nouvel utilisateur !');
    }
    else {
        header('Location: index.php?page=inscriptionsucces');
    }
}
