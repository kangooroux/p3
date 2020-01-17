<?php

require_once("Manager.php");

class UtilisateurManager extends Manager
{
    public function verifIdentifiant($userName)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_name FROM utilisateurs WHERE user_name = ?');
        $user->execute([$userName]);
        $verif = $user->fetch();
        return $verif;
    }

    public function ajoutUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO utilisateurs(nom, prenom, user_name, mdp, question, reponse) VALUES(?, ?, ?, ?, ?, ?)');
        $nouvelleEntree = $user->execute([$nom, $prenom, $userName, $mdp, $questionS, $reponseS]);
        return $nouvelleEntree;
    }
}

function nouvelUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS)
{
    $utilisateurManager = new UtilisateurManager();
    $verif = $utilisateurManager->verifIdentifiant($userName);
    if ($userName == $verif) {
        echo "Identifiant déja utilisé";
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

$nom = 'Bousquet';
$prenom = 'Alexandre';
$userName = 'Kangoo';
$mdp = 'Should be hashed';
$questionS = 'Childhood dog';
$reponseS = 'Rex';



nouvelUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS);
?>
