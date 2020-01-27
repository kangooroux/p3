<?php

session_start();

require_once('model/UtilisateurManager.php');
require_once('model/ActeurManager.php');
require_once('model/CommentaireManager.php');
require_once('model/LikeManager.php');

// A retirer avant de rendre le projet
require_once('public/src/IceCream/IceCream.php');
require_once('public/src/IceCream/functions.php');
use function IceCream\ic;
// A retirer avant de rendre le projet

function defaut()
{
    require('view/frontend/page_connexion.php');
}

function inscription()
{
    require('view/frontend/page_inscription.php');
}

function reinitMdp()
{
    require('view/frontend/page_reinit_mdp.php');
}

function mentionslegales()
{
    require('view/frontend/mentions_legales.php');
}

function contact()
{
    require('view/frontend/contact.php');
}

function deconnexion()
{
    $_SESSION = array();
    require('view/frontend/page_connexion.php');
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
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['user_name'] = $userName;
            header('http://localhost/p3/index.php');

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
            $_SESSION['nom'] = $verif['nom'];
            $_SESSION['prenom'] = $verif['prenom'];
            $_SESSION['user_name'] = $verif['user_name'];
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

function acteur($acteurId, $userName)
{
    $acteurManager = new ActeurManager();
    $acteurAffiche = $acteurManager->choisirActeur($acteurId);
    if ($acteurAffiche) {
        $compteurutilisateurManager = new CommentaireManager();
        $compteur = $compteurutilisateurManager->compterCommentaires($acteurId);
        $compteurLikesManager = new LikeManager();
        $likes = $compteurLikesManager->compterLikes($acteurId);
        $compteurDislikesManager = new LikeManager();
        $dislikes = $compteurDislikesManager->compterDislikes($acteurId);
        $totalLikeDislike = $likes + $dislikes;
        $commentVerif = new CommentaireManager();
        $commentaireExiste = $commentVerif->commentaireExiste($acteurId, $userName);
        $likeVerif = new LikeManager();
        $likeExiste = $likeVerif->checkLike($acteurId, $userName);
        $commentaireManager = new CommentaireManager();
        ob_start();
        $commentaireManager->listeCommentaires($acteurId);
        $listeCommentaires = ob_get_clean();
        require('view/frontend/page_acteur.php');
    }
    else {
        echo "Aucun acteur lié à cet ID";
    }
    $commentaireManager = new CommentaireManager();
}

function postCommentaire($commentaire)
{
    $commentaireManager = new CommentaireManager();
    $commentaireManager->insererCommentaire($commentaire);
}

function postDislike($acteurId, $userName)
{
    $dislikeManager = new LikeManager();
    $dislikeManager->ajouterDislike($acteurId, $userName);
}

function postLike($acteurId, $userName)
{
    $dislikeManager = new LikeManager();
    $dislikeManager->ajouterLike($acteurId, $userName);
}
