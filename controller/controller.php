<?php

session_start();

require_once('model/UtilisateurManager.php');
require_once('model/ActeurManager.php');
require_once('model/CommentaireManager.php');
require_once('model/LikeManager.php');

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
            $utilisateurIdManager = new UtilisateurManager();
            $userId = $utilisateurIdManager->obetenirId($userName);
            $_SESSION['user_id'] = $userId['user_id'];
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
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
            $_SESSION['user_id'] = $verif['user_id'];
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

function acteur($acteurId, $userId)
{
    $acteurManager = new ActeurManager();
    $acteurAffiche = $acteurManager->choisirActeur($acteurId);
    if ($acteurAffiche) {
        $compteurutilisateurManager = new CommentaireManager();
        $compteur = $compteurutilisateurManager->compterCommentaires($acteurId);
        $compteurLikesManager = new LikeManager();
        $likes = $compteurLikesManager->compterVote($acteurId);
        $commentVerif = new CommentaireManager();
        $commentaireExiste = $commentVerif->commentaireExiste($acteurId, $userId);
        $likeVerif = new LikeManager();
        $likeExiste = $likeVerif->checkLike($acteurId, $userId);
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

function postCommentaire($acteurId, $userId ,$commentaire)
{
    $commentVerif = new CommentaireManager();
    $commentaireExiste = $commentVerif->commentaireExiste($acteurId, $userId);
    if ($commentaireExiste) {
        $commentaireManager = new CommentaireManager();
        $commentaireEdit = $commentaireManager->editerCommentaire($acteurId, $userId ,$commentaire);
    }
    elseif (!$commentaireExiste) {
        $commentaireManager = new CommentaireManager();
        $commentaireInsere = $commentaireManager->insererCommentaire($acteurId, $userId ,$commentaire);
    }
}

function postDislike($acteurId, $userId)
{
    $likeVerif = new LikeManager();
    $likeExiste = $likeVerif->checkLike($acteurId, $userId);
    if ($likeExiste) {
      $dislikeManager = new LikeManager();
      $dislikeManager->editerDislike($acteurId, $userId);
    }
    else {
        $dislikeManager = new LikeManager();
        $dislikeManager->ajouterDislike($acteurId, $userId);
    }
}

function postLike($acteurId, $userId)
{
    $likeVerif = new LikeManager();
    $likeExiste = $likeVerif->checkLike($acteurId, $userId);
    if ($likeExiste) {
        $dislikeManager = new LikeManager();
        $dislikeManager->editerLike($acteurId, $userId);
    }
    else {
        $dislikeManager = new LikeManager();
        $dislikeManager->ajouterLike($acteurId, $userId);
    }
}

function paramCompte($userId)
{
    $utilisateurManager = new UtilisateurManager();
    $infosCompte = $utilisateurManager->infosCompte($userId);
    require('view/frontend/page_param_compte.php');
}

function pageNonTrouvee()
{
    require('view/frontend/page_non_trouvee.php');
}

function modifierIdentite($nom, $prenom, $userName, $userId)
{
    $utilisateurManager = new UtilisateurManager();
    $infosModif = $utilisateurManager->modifierInfos($nom, $prenom, $userName, $userId);
    if ($infosModif) {
      $_SESSION['nom'] = $nom;
      $_SESSION['prenom'] = $prenom;
      $utilisateurManager = new UtilisateurManager();
      $infosCompte = $utilisateurManager->infosCompte($userId);
      require('view/frontend/page_param_compte.php');
    }
}

function modifierMotDePasse($nouveauMdp, $confirmNouveauMdp, $userId)
{
    if ($nouveauMdp != $confirmNouveauMdp) {
        $mdpNonConcordance = '';
        $utilisateurManager = new UtilisateurManager();
        $infosCompte = $utilisateurManager->infosCompte($userId);
        require('view/frontend/page_param_compte.php');
    }
    else {
        $utilisateurManager = new UtilisateurManager();
        $modifMdp = $utilisateurManager->modifierMdp($nouveauMdp, $userId);
        if ($modifMdp) {
            $utilisateurManager = new UtilisateurManager();
            $infosCompte = $utilisateurManager->infosCompte($userId);
            require('view/frontend/page_param_compte.php');
        }
    }
}

function modifierQuestionReponse($question, $reponse, $userId)
{
    $utilisateurManager = new UtilisateurManager();
    $modifQR = $utilisateurManager->modifierQR($question, $reponse, $userId);
    if ($modifQR) {
        $utilisateurManager = new UtilisateurManager();
        $infosCompte = $utilisateurManager->infosCompte($userId);
        require('view/frontend/page_param_compte.php');
    }
}
