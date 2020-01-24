<?php

require_once("Manager.php");

class CommentaireManager extends Manager
{

    public function listeCommentaires($acteurId)
    {
        $db = $this->dbConnect();
        $donnees = $db->query('SELECT * FROM commentaires WHERE acteur_id ='. $acteurId . '');
        $commentairesTotal = 0;
        while ($commentaires = $donnees->fetch()) {
            $commentairesTotal++;
            require('view/frontend/vignette_commentaire_template.php');
        }
        $donnees->closeCursor();
        return $commentairesTotal;
    }

    public function compterCommentaires($acteurId)
    {
      $db = $this->dbConnect();
      $donnees = $db->query('SELECT * FROM commentaires WHERE acteur_id ='. $acteurId . '');
      $commentairesTotal = 0;
      while ($commentaires = $donnees->fetch()) {
          $commentairesTotal++;
      }
      $donnees->closeCursor();
      return $commentairesTotal;
    }
}
