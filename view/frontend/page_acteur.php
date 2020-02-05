<?php $title = $acteurAffiche['nom_acteur']; ?>

<?php ob_start(); ?>

<?php if (isset($_GET['nouveaucommentaire'])): ?>
    <form class="bulle_commentaire" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" method="post">
        <label for="commentaire" class="commentaire_label">Laisser votre commentaire : </label>
        <input type="text" name="" value="<?php echo $_SESSION['prenom'] . ', '; ?><?php echo 'le ' . date('d') . '/' . date('m') . '/' . date('Y')?>" readonly>
        <textarea name="commentaire" class="commentaire_zone"></textarea>
        <input type="hidden" name="nouveau_commentaire" value="">
        <input type="submit" name="envoyer_commentaire" value="Envoyer" class="commentaire_envoi">
    </form>
<?php elseif (isset($_GET['modifcommentaire'])): ?>
    <form class="bulle_commentaire" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" method="post">
        <label for="commentaire" class="commentaire_label">Modifier votre commentaire : </label>
        <input type="text" name="" value="<?php echo $_SESSION['prenom'] . ', '; ?><?php echo 'le ' . date('d') . '/' . date('m') . '/' . date('Y')?>" readonly>
        <input type="hidden" name="modif_commentaire" value="">
        <textarea name="commentaire" class="commentaire_zone"><?php echo $commentaireExiste['commentaire'];; ?></textarea>
        <input type="submit" name="envoyer_commentaire" value="Modifier" class="commentaire_envoi">
    </form>
<?php endif; ?>

<?php if (isset($_POST['commentaire']) && isset($_POST['nouveau_commentaire'])): ?>
    <div class="conteneur_confirm">
        <img src="public/images/29_104867.png" alt="image taches terminés" class="image_commentaire_confirm"><p class="commentaire_confirm">Votre commentaire a été ajouté</p>
    </div>
<?php elseif (isset($_POST['commentaire']) && isset($_POST['modif_commentaire'])): ?>
    <div class="conteneur_confirm">
        <img src="public/images/29_104867.png" alt="image taches terminés" class="image_commentaire_confirm"><p class="commentaire_confirm">Votre commentaire a été modifié</p>
    </div>
<?php endif; ?>

<?php if (isset($_POST['like'])): ?>
    <div class="conteneur_like_confirm">
        <img src="public/images/ThumbsUp_40975.png" alt="image pouce vers le haut" class="image_like_confirm"><p class="like_confirm">Vous avez liké</p>
    </div>
<?php elseif (isset($_POST['dislike'])): ?>
    <div class="conteneur_like_confirm">
        <img src="public/images/ThumbsDown_40974.png" alt="image pouce vers le bas" class="image_like_confirm"><p class="like_confirm">Vous avez disliké</p>
    </div>
<?php endif; ?>

<section class="page_acteur">
    <div class="page_acteur_logo"> <img src="<?php echo $acteurAffiche['chemin_logo_acteur']; ?>" alt=""> </div>
    <h2><?php echo $acteurAffiche['nom_acteur']; ?></h2>
    <a href="#" class='acteur_lien_ext'><?php echo $acteurAffiche['acteur_lien']; ?></a>
    <?php echo $acteurAffiche['contenu_textuel']; ?>
</section>

<section class="conteneur_commentaires">
    <div class="conteneur_infos-bouton_commentaires">
        <h3><?php echo $compteur; ?> commentaires</h3>
        <?php if (!$commentaireExiste): ?>
            <a href="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>&nouveaucommentaire" class="nouveau_commentaire">Nouveau <br>commentaire</a>
        <?php elseif ($commentaireExiste): ?>
            <a href="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>&modifcommentaire" class="nouveau_commentaire">Modifer <br>commentaire</a>
            <p class="deja_commente">Vous avez commenté cet acteur/partenaire.</p>
        <?php endif; ?>
        <?php if ($likeExiste['vote'] == 1): ?>
            <p class="deja_like">Vous avez liké cet acteur/partenaire.</p>
        <?php elseif ($likeExiste['vote'] == -1): ?>
            <p class="deja_like">Vous avez disliké cet acteur/partenaire.</p>
        <?php endif; ?>
        <div class="compteur_likes">
                <img src="public/images/uparrow_arriba_1538.png" alt="">
                <span class="nombre_likes"><?php echo $likes; ?></span>
                <img src="public/images/arrowdown_flech_1539.png" alt="">
                <span class="nombre_dislikes"><?php echo $dislikes; ?></span>
        </div>
        <?php if (!$likeExiste): ?>
            <form method="post" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" class="boutton_like">
                <input type="hidden" name="like" value="">
                <input type="image" src="public/images/ThumbsUp_40975.png" name="like" alt="image thumb up vert" />
            </form>
            <form method="post" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" class="boutton_dislike">
                <input type="hidden" name="dislike" value="">
                <input type="image" src="public/images/ThumbsDown_40974.png" name="dislike" alt="image thumb down rouge" />
            </form>
        <?php elseif ($likeExiste['vote'] == 1): ?>
            <div class="boutton_like">
              <input type="hidden" name="like" value="">
              <input type="image" src="public/images/ThumbsUp_40975.png" name="like" alt="image thumb up vert" />
            </div>
            <form method="post" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" class="boutton_dislike">
                <input type="hidden" name="dislike" value="">
                <input type="image" src="public/images/ThumbsDown_40974.png" name="dislike" alt="image thumb down rouge" />
            </form>
        <?php elseif ($likeExiste['vote'] == -1): ?>
            <form method="post" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" class="boutton_like">
                <input type="hidden" name="like" value="">
                <input type="image" src="public/images/ThumbsUp_40975.png" name="like" alt="image thumb up vert" />
            </form>
            <div class="boutton_dislike">
                <input type="hidden" name="dislike" value="">
                <input type="image" src="public/images/ThumbsDown_40974.png" name="dislike" alt="image thumb down rouge" />
            </div>
        <?php endif; ?>
    </div>
    <?php echo $listeCommentaires; ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/connecte_template.php'); ?>
