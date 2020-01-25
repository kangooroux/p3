<?php $title = $acteurAffiche['nom_acteur']; ?>

<?php ob_start(); ?>

<section class="page_acteur">
    <div class="page_acteur_logo"> <img src="<?php echo $acteurAffiche['chemin_logo_acteur']; ?>" alt=""> </div>
    <h2><?php echo $acteurAffiche['nom_acteur']; ?></h2>
    <a href="#"><?php echo $acteurAffiche['acteur_lien']; ?></a>
    <?php echo $acteurAffiche['contenu_textuel']; ?>
</section>
<section class="conteneur_commentaires">
    <div class="">
        <h3><?php echo $compteur; ?> commentaires</h3>
        <a href="#" class="nouveau_commentaire">Nouveau commentaire</a>
        <a href="#" class="boutton_like"> <img src="public/images/ThumbsUp_40975.png" alt="Bouton like"> </a>
        <a href="#" class="boutton_dislike"> <img src="public/images/ThumbsDown_40974.png" alt="Bouton dislike"> </a>
    </div>
    <?php echo $listeCommentaires; ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/connecte_template.php'); ?>
