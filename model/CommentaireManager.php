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

    public function commentaireExiste($acteurId, $userName)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM commentaires WHERE acteur_id =? AND user_name =?');
        $req->execute([$acteurId, $userName]);
        $donnees = $req->fetch();
        return $donnees;
    }

    public function insererCommentaire($commentaire)
    {
      $db = $this->dbConnect();
      $user = $db->prepare('INSERT INTO commentaires(prenom, user_name, commentaire, date_pub, acteur_id) VALUES(?, ?, ?, NOW(), ?)');
      $nouvelleEntree = $user->execute([$_SESSION['prenom'], $_SESSION['user_name'], $commentaire, $_GET['acteurid']]);
      return $nouvelleEntree;
    }
}
