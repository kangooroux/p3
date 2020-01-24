<?php

require_once("Manager.php");

class LikeManager extends Manager
{

    public function compterLikes()
    {
        $db = $this->dbConnect();
        $donnees = $db->query('SELECT id, chemin_logo_acteur, nom_acteur, premiere_ligne, acteur_lien FROM acteurs');
        while ($acteurs = $donnees->fetch()) {
            require('view/frontend/vignette_acteur_template.php');
        }
        $donnees->closeCursor();
    }

    public function choisirActeur($acteurid)
    {
        $db = $this->dbConnect();
        $acteur = $db->prepare('SELECT * FROM acteurs WHERE id = :acteur_id');
        $acteur->execute(array('acteur_id' => $acteurid));
        $infoActeur = $acteur->fetch();
        return $infoActeur;
    }
}
