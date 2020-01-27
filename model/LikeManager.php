<?php

require_once("Manager.php");

class LikeManager extends Manager
{
    public function compterLikes($acteurId)
    {
        $db = $this->dbConnect();
        $donnees = $db->query('SELECT * FROM likes WHERE acteur_id ='. $acteurId . ' AND likes = 1');
        $likesTotal = 0;
        while ($likes = $donnees->fetch()) {
            $likesTotal++;
        }
        $donnees->closeCursor();
        return $likesTotal;
    }

    public function compterDislikes($acteurId)
    {
        $db = $this->dbConnect();
        $donnees = $db->query('SELECT * FROM likes WHERE acteur_id ='. $acteurId . ' AND dislikes = 1');
        $dislikesTotal = 0;
        while ($dislikes = $donnees->fetch()) {
            $dislikesTotal--;
        }
        $donnees->closeCursor();
        return $dislikesTotal;
    }

    public function ajouterLike($acteurId, $userName)
    {
        $db = $this->dbConnect();
        $vote = $db->prepare('INSERT INTO likes(likes, user_name, acteur_id) VALUES(?, ?, ?)');
        $vote->execute([1 , $userName, $acteurId]);
    }

    public function ajouterDislike($acteurId, $userName)
    {
        $db = $this->dbConnect();
        $vote = $db->prepare('INSERT INTO likes(dislikes, user_name, acteur_id) VALUES(?, ?, ?)');
        $vote->execute([1 , $userName, $acteurId]);
    }

    public function checkLike($acteurId, $userName)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM likes WHERE acteur_id =? AND user_name =?');
        $req->execute([$acteurId, $userName]);
        $donnees = $req->fetch();
        return $donnees;
    }
}
