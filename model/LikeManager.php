<?php

require_once("Manager.php");

class LikeManager extends Manager
{
    public function compterVote($acteurId)
    {
        $db = $this->dbConnect();
        $donnees = $db->query('SELECT * FROM likes WHERE acteur_id ='. $acteurId . '');
        $likesTotal = 0;
        while ($likes = $donnees->fetch()) {
            $likesTotal + $likes;
        }
        $donnees->closeCursor();
        return $likesTotal;
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

    public function checkLike($acteurId, $userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM likes WHERE acteur_id =? AND user_id =?');
        $req->execute([$acteurId, $userId]);
        $donnees = $req->fetch();
        return $donnees;
    }
}
