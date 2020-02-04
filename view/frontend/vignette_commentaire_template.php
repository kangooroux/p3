<!-- Modèle de vignette utilisé pour lister les commentaires avec une boucle -->
<div class="vignette_commentaire">
    <p class="paragraphe_commentaire"><?php echo $commentaires['prenom']; ?>,</p>
    <p class="paragraphe_commentaire">le <?php echo $commentaires['jour'] . '/' . $commentaires['mois'] . '/' . $commentaires['annee'] . ' à ' . $commentaires['heure'] . ':' . $commentaires['minute'] . ':' . $commentaires['seconde']?>,</p>
    <p class="paragraphe_commentaire"><?php echo $commentaires['commentaire']; ?></p>
</div>
