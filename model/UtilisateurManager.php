<?php

require_once("Manager.php");

class UtilisateurManager extends Manager
{

    public function verifIdentifiant($userName)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_name FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $userName));
        $verif = $user->fetch();
        return $verif;
    }

    public function ajoutUtilisateur($nom, $prenom, $userName, $mdp, $questionS, $reponseS)
    {
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $reponseS = password_hash($reponseS, PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO utilisateurs(nom, prenom, user_name, mdp, question, reponse) VALUES(?, ?, ?, ?, ?, ?)');
        $nouvelleEntree = $user->execute([$nom, $prenom, $userName, $mdp, $questionS, $reponseS]);
        return $nouvelleEntree;
    }

    public function obetenirId($userName)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_id FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $userName));
        $verif = $user->fetch();
        return $verif;
    }

    public function oublieMdpVerif($userName)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_name, question FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $userName));
        $verif = $user->fetch();
        return $verif;
    }

    public function oublieMdpVerifReponse($userName)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_name, question, reponse FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $userName));
        $verif = $user->fetch();
        return $verif;
    }

    public function modifMdp($userName, $nouveauMdp)
    {
        $nouveauMdp = password_hash($nouveauMdp, PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $user = $db->prepare('UPDATE utilisateurs SET mdp = ? WHERE utilisateurs . user_name = ?');
        $nouvelleEntree = $user->execute([$nouveauMdp, $userName]);
        return $nouvelleEntree;
    }

    public function verifMdp($identifiant)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_id, nom, prenom, mdp FROM utilisateurs WHERE user_name = :user_name');
        $user->execute(array('user_name' => $identifiant));
        $verif = $user->fetch();
        return $verif;
    }

    public function infosCompte($userId)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT nom, prenom, user_name, question FROM utilisateurs WHERE user_id = :user_id');
        $user->execute(array('user_id' => $userId));
        $infos = $user->fetch();
        return $infos;
    }

    public function modifierInfos($nom, $prenom, $userName, $userId)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('UPDATE utilisateurs SET nom = ?, prenom = ?, user_name = ? WHERE user_id = ?');
        $modifEntree = $user->execute([$nom, $prenom, $userName, $userId]);
        return $modifEntree;
    }

    public function modifierMdp($nouveauMdp, $userId)
    {
        $nouveauMdp = password_hash($nouveauMdp, PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $user = $db->prepare('UPDATE utilisateurs SET mdp = ? WHERE user_id = ?');
        $modifEntree = $user->execute([$nouveauMdp, $userId]);
        return $modifEntree;
    }

    public function modifierQR($question, $reponse, $userId)
    {
        $reponse = password_hash($reponse, PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $user = $db->prepare('UPDATE utilisateurs SET question = ? , reponse = ? WHERE user_id = ?');
        $modifEntree = $user->execute([$question, $reponse, $userId]);
        return $modifEntree;
    }

    public function verifEditIdentifiant($userName, $userId)
    {
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT user_name FROM utilisateurs WHERE user_id = :user_id AND user_name = :user_name');
        $user->execute(array('user_id' => $userId, 'user_name' => $userName));
        $infos = $user->fetch();
        return $infos;
    }
}
