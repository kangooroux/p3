<?php

session_start();

require_once('model/UtilisateurManager.php');
require_once('public/src/IceCream/IceCream.php');
require_once('public/src/IceCream/functions.php');

use function IceCream\ic;

function page_defaut()
{
    if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
        require('view/frontend/page_liste_acteurs.php');
    }
    else {
        require('view/frontend/page_connexion.php');
    }
}

function inscription()
{
    require('view/frontend/page_inscription.php');
}

function reinitMdp()
{
    require('view/frontend/page_reinit_mdp.php');
}

function reinitMdpQuestion($userName)
{
    $utilisateurManager = new UtilisateurManager();
    $verif = $utilisateurManager->oublieMdpVerif($userName);
    if ($verif['user_name'] == $userName) {
        $afficherquestion = '';
        $_SESSION["userName"] = $userName;
    }
    else {
        $afficherNExistePas = '';
    }
    require('view/frontend/page_reinit_mdp.php');
}

function reinitMdpReponse($userName, $reponseMdpReset)
{
    $utilisateurManager = new UtilisateurManager();
    $verif = $utilisateurManager->oublieMdpVerifReponse($userName);
    $mdpConcordance = password_verify($reponseMdpReset, $verif['reponse']);
    if ($mdpConcordance) {
        $bonneReponse = '';
    }
    else {
        $mauvaiseReponse = '';
    }
    require('view/frontend/page_reinit_mdp.php');
}

function reinitMdpNouveauMdp($userName, $nouveauMdp, $confirmNouveauMdp)
{
    if ($nouveauMdp != $confirmNouveauMdp) {
        $mdpNonConcordance = '';
        require('view/frontend/page_reinit_mdp.php');
    }
    else {
        $utilisateurManager = new UtilisateurManager();
        $reinitMdp = $utilisateurManager->modifMdp($userName, $nouveauMdp);
        if ($reinitMdp) {
            $nouveauMdpSucces = '';
            require('view/frontend/page_connexion.php');
            $_SESSION = array();
        }
        else {
            echo "Erreur";
        }
    }

}

function nouvelUtilisateur($nom, $prenom, $userName, $mdp, $confirmMdp, $questionS, $reponseS)
{
    $utilisateurManager = new UtilisateurManager();
    $verif = $utilisateurManager->verifIdentifiant($userName);
    if ($verif['user_name'] == $userName) {
        $afficherDoublon = '';
        require('view/frontend/page_inscription.php');
    }
    elseif ($mdp != $confirmMdp) {
        $afficherNonConcordance = '';
        require('view/frontend/page_inscription.php');
    }
    else {
        $nouvelleEntree = $utilisateurManager->ajoutUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS);
        if ($nouvelleEntree === false) {
            echo 'Impossible d\'ajouter le nouvel utilisateur !';
        }
        else {
            // $_SESSION['nom'] = $verif['nom'];
            // $_SESSION['prenom'] = $verif['prenom'];
            require('view/frontend/page_liste_acteurs.php');
        }
    }
}

function connexion($identifiant, $motDePasse)
{
    $utilisateurManager = new UtilisateurManager();
    $verif = $utilisateurManager->verifMdp($identifiant);
    if (password_verify($motDePasse, $verif['mdp'])) {
        // $_SESSION['nom'] = $verif['nom'];
        // $_SESSION['prenom'] = $verif['prenom'];
        require('view/frontend/page_liste_acteurs.php');
    }
    else {
        $mauvaisIdentifiants = '';
        require('view/frontend/page_connexion.php');
    }
}
