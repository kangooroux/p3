<!-- Modèle de vignette utilisé pour lister les acteur dans la page principale connecté avec une boucle -->
<div class="conteneur_acteur">
    <div class="conteneur_logo_acteur"> <img src="<?php echo $acteurs[1]; ?>" alt=""> </div>
    <div>
        <h3 class="nom_acteur"><?php echo $acteurs[2]; ?></h3>
        <p class="premiere_ligne"><?php $premiereLigne = explode(".", $acteurs[3]); echo $premiereLigne[0]; ?> ...</p>
    </div>
    <a href="?page=acteur&amp;acteurid=<?php echo $acteurs[0]; ?>" class="lire_la_suite">Afficher la suite</a>
</div>
