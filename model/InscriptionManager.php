<?php

require_once("Manager.php");

class InscriptionManager extends Manager
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
        $db = $this->dbConnect();
        $user = $db->prepare('INSERT INTO utilisateurs(nom, prenom, user_name, mdp, question, reponse) VALUES(?, ?, ?, ?, ?, ?)');
        $nouvelleEntree = $user->execute([$nom, $prenom, $userName, $mdp, $questionS, $reponseS]);
        return $nouvelleEntree;
    }
}
