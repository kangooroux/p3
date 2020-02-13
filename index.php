<?php
require_once('fonctions/fonctions.php');

try {
    if (isset($_POST['deconnexion'])) {
        deconnexion();
    }
    elseif (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['user_id'])) {
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'deconnexion') {
                deconnexion();
            }
            elseif ($_GET['page'] == 'mentionslegales') {
                mentionslegales();
            }
            elseif ($_GET['page'] == 'contact') {
                contact();
            }
            elseif ($_GET['page'] == 'parametrescompte') {
                paramCompte($_SESSION['user_id']);
            }
            elseif (($_GET['page'] == 'acteur') && (isset($_GET['acteurid']))) {
                if (isset($_POST['commentaire'])) {
                    postCommentaire($_GET['acteurid'], $_SESSION['user_id'], htmlspecialchars($_POST['commentaire']));
                }
                elseif (isset($_POST['like'])) {
                    postLike($_GET['acteurid'], $_SESSION['user_id']);
                }
                elseif (isset($_POST['dislike'])) {
                    postDislike($_GET['acteurid'], $_SESSION['user_id']);
                }
                acteur($_GET['acteurid'], $_SESSION['user_id']);
            }
            elseif ($_GET['page'] == 'paramcompte') {
                if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['user_name'])) {
                    modifierIdentite(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['user_name']), $_SESSION['user_id']);
                }
                elseif (isset($_POST['mdp']) && isset($_POST['confirm_mdp'])) {
                    modifierMotDePasse(htmlspecialchars($_POST['mdp']), htmlspecialchars($_POST['confirm_mdp']), $_SESSION['user_id']);
                }
                elseif (isset($_POST['question']) && isset($_POST['reponse'])) {
                    modifierQuestionReponse(htmlspecialchars($_POST['question']), htmlspecialchars($_POST['reponse']), $_SESSION['user_id']);
                }
                else {
                    paramCompte($_SESSION['user_id']);
                }
            }
            else {
                pageNonTrouvee();
            }
        }
        else {
            pageActeurs();
        }
    }
    elseif (isset($_GET['page'])) {
        if ($_GET['page'] == 'inscription') {
            if (isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['userName']) && ($_POST['mdp']) && ($_POST['confirmMdp']) && ($_POST['questionSecrete']) && ($_POST['reponseSecrete'])) {
                nouvelUtilisateur(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['userName']), htmlspecialchars($_POST['mdp']), htmlspecialchars($_POST['confirmMdp']), htmlspecialchars($_POST['questionSecrete']), htmlspecialchars($_POST['reponseSecrete']));
                pageActeurs();
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
        elseif ($_GET['page'] == 'mentionslegales') {
            mentionslegales();
        }
        elseif ($_GET['page'] == 'contact') {
            contact();
        }
        else {
            pageNonTrouvee();
        }
    }
    elseif (isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['userName']) && ($_POST['mdp']) && ($_POST['confirmMdp']) && ($_POST['questionSecrete']) && ($_POST['reponseSecrete'])) {
        nouvelUtilisateur(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['userName']), htmlspecialchars($_POST['mdp']), htmlspecialchars($_POST['confirmMdp']), htmlspecialchars($_POST['questionSecrete']), htmlspecialchars($_POST['reponseSecrete']));
        pageActeurs();
    }
    elseif ((isset($_POST['identifiant'])) && (isset($_POST['motDePasse']))) {
        connexion(htmlspecialchars($_POST['identifiant']), htmlspecialchars($_POST['motDePasse']));
        pageActeurs();
    }
    else {
        pageConnexion();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
