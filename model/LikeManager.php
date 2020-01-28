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
            $likesTotal = $likesTotal + $likes['vote'];
        }
        $donnees->closeCursor();
        return $likesTotal;
    }

    public function ajouterLike($acteurId, $userId)
    {
        $db = $this->dbConnect();
        $vote = $db->prepare('INSERT INTO likes(vote, user_id, acteur_id) VALUES(?, ?, ?)');
        $vote->execute([1 , $userId, $acteurId]);
    }

    public function ajouterDislike($acteurId, $userId)
    {
        $db = $this->dbConnect();
        $vote = $db->prepare('INSERT INTO likes(vote, user_id, acteur_id) VALUES(?, ?, ?)');
        $vote->execute([-1 , $userId, $acteurId]);
    }

    public function checkLike($acteurId, $userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM likes WHERE acteur_id =? AND user_id =?');
        $req->execute([$acteurId, $userId]);
        $donnees = $req->fetch();
        return $donnees;
    }

    public function editerDislike($acteurId, $userId)
    {
        $db = $this->dbConnect();
        $modifVote = $db->exec('UPDATE likes SET vote = -1 WHERE user_id = ' . $userId . ' AND acteur_id = ' . $acteurId . '');
        return $modifVote;
    }

    public function editerlike($acteurId, $userId)
    {
        $db = $this->dbConnect();
        $modifVote = $db->exec('UPDATE likes SET vote = 1 WHERE user_id = ' . $userId . ' AND acteur_id = ' . $acteurId . '');
        return $modifVote;
    }
}
