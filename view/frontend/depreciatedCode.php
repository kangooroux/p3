<?php if ($likeExiste['vote'] == 1): ?>
    <p class="deja_like">Vous avez liké cet acteur/partenaire.</p>
<?php elseif ($likeExiste['vote'] == -1): ?>
    <p class="deja_like">Vous avez disliké cet acteur/partenaire.</p>
<?php endif; ?>
<!-- Deux compteur séparé pour like et dislike -->
<!-- <div class="compteur_likes">
        <img src="public/images/uparrow_arriba_1538.png" alt="">
        <span class="nombre_likes"><?php echo $likes; ?></span>
        <img src="public/images/arrowdown_flech_1539.png" alt="">
        <span class="nombre_dislikes"><?php echo $dislikes; ?></span>
</div> -->
