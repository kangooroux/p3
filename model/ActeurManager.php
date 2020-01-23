<?php

require_once("Manager.php");

class ActeurManager extends Manager
{

    public function listeActeurs()
    {
        $db = $this->dbConnect();
        $donnees = $db->query('SELECT chemin_logo_acteur, nom_acteur, premiere_ligne FROM acteurs');
        while ($acteurs = $donnees->fetch()) {
            require('view/frontend/vignette_acteur_template.php');
        }
        $donnees->closeCursor();
    }

}
