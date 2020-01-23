<?php

session_start();

require_once('model/UtilisateurManager.php');
require_once('model/ActeurManager.php');

// A retirer avant de rendre le projet
require_once('public/src/IceCream/IceCream.php');
require_once('public/src/IceCream/functions.php');
use function IceCream\ic;
// A retirer avant de rendre le projet

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
    if ($verif) {
        if ($verif['user_name'] == $userName) {
            $afficherquestion = '';
            $_SESSION["userName"] = $userName;
        } else {
            echo 'Impossible d\'obtenir la vérification';
        }
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
    if ($verif) {
        $mdpConcordance = password_verify($reponseMdpReset, $verif['reponse']);
        if ($mdpConcordance) {
            $bonneReponse = '';
            require('view/frontend/page_reinit_mdp.php');
        }
        else {
            $mauvaiseReponse = '';
            require('view/frontend/page_reinit_mdp.php');
        }
    }
    else {
        echo 'Impossible d\'obtenir la vérification';
    }

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
    if ($verif) {
        if ($verif['user_name'] == $userName) {
            $afficherDoublon = '';
            require('view/frontend/page_inscription.php');
        }
        else {
            echo 'Impossible d\'obtenir la vérification';
        }
    }
    elseif ($mdp != $confirmMdp) {
        $afficherNonConcordance = '';
        require('view/frontend/page_inscription.php');
    }
    else {
        $nouvelleEntree = $utilisateurManager->ajoutUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS);
        if ($nouvelleEntree) {
            // $_SESSION['nom'] = $verif['nom'];
            // $_SESSION['prenom'] = $verif['prenom'];
            require('view/frontend/page_liste_acteurs.php');

        }
        else {
            echo 'Impossible d\'ajouter le nouvel utilisateur !';
        }
    }
}

function connexion($identifiant, $motDePasse)
{
    $utilisateurManager = new UtilisateurManager();
    $verif = $utilisateurManager->verifMdp($identifiant);
    if ($verif) {
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
    else {
      $mauvaisIdentifiants = '';
      require('view/frontend/page_connexion.php');
    }

}

function pageActeurs()
{
    $acteurManager = new ActeurManager();
    ob_start();
    $acteurManager->listeActeurs();
    $listePartenaires = ob_get_clean();
    require('view/frontend/page_liste_acteurs.php');
}
