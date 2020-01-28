<?php $title = 'Accueil acteurs/partenaires'; ?>

<?php ob_start(); ?>
<section>
    <h1>Bienvenue</h1>
    <p>Le <em>Groupement Banque Assurance Français</em> (GBAF) est une fédération
    représentant les 6 grands groupes français :</p>
    <ul class="liste_banque">
        <li>BNP Paribas</li>
        <li>BPCE</li>
        <li>Crédit Agricole</li>
        <li>Crédit Mutuel-CIC</li>
        <li>Société Générale</li>
        <li>La Banque Postale</li>
    </ul>
    <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.</p>
    <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
    <p>Les produits et services bancaires sont nombreux et très variés. Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchent sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.</p>
    <p>Ce site propose aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers. Chaque salarié pourra ainsi poster un commentaire et donner son avis.</p>
    <div class="conteneur_img_avis"> <img src="/p3/public/images/avis.jpg" alt="illustrations de personnnes échangeant des opinions"> </div>
</section>

<section>
    <h2 class="page_acteurs_h2">Liste des acteurs/partenaires</h2>
    <p>Vous est présenté ci-dessous les différents acteurs/partenaires, vous pouvez commenter et/ou liker un acteur/partenaire en cliquant sur "lire la suite" et en vous rendant sur leur page dédié.</p>
</section>
<?php echo $listePartenaires; ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/connecte_template.php'); ?>
