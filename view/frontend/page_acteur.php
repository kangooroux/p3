<?php $title = $acteurAffiche['nom_acteur']; ?>

<?php ob_start(); ?>

<?php if (isset($_GET['nouveaucommentaire'])): ?>
    <form class="bulle_commentaire" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" method="post">
        <label for="commentaire" class="commentaire_label">Laisser votre commentaire : </label>
        <textarea name="commentaire" class="commentaire_zone"></textarea>
        <input type="submit" name="envoyer_commentaire" value="Envoyer" class="commentaire_envoi">
    </form>
<?php endif; ?>

<?php if (isset($_POST['commentaire'])): ?>
    <div class="conteneur_confirm">
        <img src="public/images/29_104867.png" alt="image taches terminés" class="image_commentaire_confirm"><p class="commentaire_confirm">Votre commentaire a été ajouté</p>
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
        <?php else: ?>
            <p class="deja_commente">Vous avez commenté cet acteur/partenaire.</p>
        <?php endif; ?>
        <?php if ($likeExiste['likes']): ?>
            <p class="deja_like">Vous avez liké cet acteur/partenaire.</p>
        <?php elseif ($likeExiste['dislikes']): ?>
            <p class="deja_like">Vous avez disliké cet acteur/partenaire.</p>
        <?php endif; ?>
        <div class="compteur_likes">
            <?php if ($likes >= 0): ?>
                <img src="public/images/uparrow_arriba_1538.png" alt="">
                <span class="nombre_likes"><?php echo $likes; ?></span>
            <?php endif; ?>
            <?php if ($likes < 0): ?>
                <img src="public/images/arrowdown_flech_1539.png" alt="">
                <span class="nombre_likes"><?php echo $likes; ?></span>
            <?php endif; ?>
        </div>
        <?php if (!$likeExiste): ?>
            <form method="post" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" class="boutton_like">
                <input type="hidden" name="like" value="">
                <input type="image" src="public/images/ThumbsUp_40975.png" name="like" value="like" />
            </form>
            <form method="post" action="?page=acteur&acteurid=<?php echo $acteurAffiche['acteur_id']; ?>" class="boutton_dislike">
                <input type="hidden" name="dislike" value="">
                <input type="image" src="public/images/ThumbsDown_40974.png" name="dislike" value="dislike" />
            </form>
        <?php endif; ?>

    </div>
    <?php echo $listeCommentaires; ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/connecte_template.php'); ?>
