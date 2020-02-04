<?php

require_once("Manager.php");

class CommentaireManager extends Manager
{

    public function listeCommentaires($acteurId)
    {
        $db = $this->dbConnect();
        $donnees = $db->query('SELECT u.prenom prenom, DATE_FORMAT(c.date_pub, "%d") AS jour, DATE_FORMAT(c.date_pub, "%m") AS mois, YEAR(c.date_pub) AS annee, HOUR(c.date_pub) AS heure, MINUTE(c.date_pub) AS minute, SECOND(c.date_pub) AS seconde , c.commentaire commentaire FROM commentaires c INNER JOIN utilisateurs u ON u.user_id = c.user_id WHERE c.acteur_id ='. $acteurId . '');
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

    public function commentaireExiste($acteurId, $userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM commentaires WHERE acteur_id =? AND user_id =?');
        $req->execute([$acteurId, $userId]);
        $donnees = $req->fetch();
        return $donnees;
    }

    public function insererCommentaire($acteurId, $userId ,$commentaire)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO commentaires(user_id, commentaire, date_pub, acteur_id) VALUES(?, ?, NOW(), ?)');
        $nouveauCommentaire = $req->execute([$userId, $commentaire, $acteurId]);
        return $nouveauCommentaire;
    }

    public function editerCommentaire($acteurId, $userId ,$commentaire)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET commentaire = ? , date_pub = NOW() WHERE user_id = ? AND acteur_id = ?');
        $editCommentaire = $req->execute([$commentaire, $userId, $acteurId]);
        return $editCommentaire;
    }
}
