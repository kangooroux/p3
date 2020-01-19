<?php

require_once("Manager.php");

class UtilisateurManager extends Manager
{
    // Pour vérifier si le nom d'identifiant est dêjà utilisé
    public function verifIdentifiant($userName)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_name FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $userName));
        $verif = $user->fetch();
        return $verif;
    }

    // Inscrire un utilisateur sur la base de données
    public function ajoutUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS)
    {
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $reponseS = password_hash($reponseS, PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO utilisateurs(nom, prenom, user_name, mdp, question, reponse) VALUES(?, ?, ?, ?, ?, ?)');
        $nouvelleEntree = $user->execute([$nom, $prenom, $userName, $mdp, $questionS, $reponseS]);
        return $nouvelleEntree;
    }

    // Va chercher la question à afficher sur la page de réinitialisation du mot de passe
    public function oublieMdpVerif($userName)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_name, question FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $userName));
        $verif = $user->fetch();
        return $verif;
    }

    // Vérifie la réponse donné
    public function oublieMdpVerifReponse($userName)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_name, question, reponse FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $userName));
        $verif = $user->fetch();
        return $verif;
    }

    // Modifie le mot de passe
    public function modifMdp($userName, $nouveauMdp)
    {
        $nouveauMdp = password_hash($nouveauMdp, PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $user = $db->prepare('UPDATE utilisateurs SET mdp = ? WHERE utilisateurs . user_name = ?');
        $nouvelleEntree = $user->execute([$nouveauMdp, $userName]);
        return $nouvelleEntree;
    }

    // Vérifie le mot de passe à la connection
    public function verifMdp($identifiant)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT nom, prenom, user_name, mdp FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $identifiant));
        $verif = $user->fetch();
        return $verif;
    }
}
