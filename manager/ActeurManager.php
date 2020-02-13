<?php

require_once("Manager.php");

class ActeurManager extends Manager
{

    public function listeActeurs()
    {
        $db = $this->dbConnect();
        $donnees = $db->query('SELECT acteur_id, chemin_logo_acteur, nom_acteur, contenu_textuel FROM acteurs');
        while ($acteurs = $donnees->fetch()) {
            require('view/frontend/vignette_acteur_template.php');
        }
        $donnees->closeCursor();
    }

    public function choisirActeur($acteurid)
    {
        $db = $this->dbConnect();
        $acteur = $db->prepare('SELECT * FROM acteurs WHERE acteur_id = :acteur_id');
        $acteur->execute(array('acteur_id' => $acteurid));
        $infoActeur = $acteur->fetch();
        return $infoActeur;
    }
}
