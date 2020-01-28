<?php $title = 'Paramètres du compte'; ?>

<?php ob_start(); ?>
    <?php var_dump($infosCompte); ?>
    <form class="form_identite" action="?page=paramcompte" method="post">
        <fieldset>
            <label for="nom">Nom : </label><input type="text" name="nom" value="">
            <label for="prenom">Prenom : </label><input type="text" name="prenom" value="">
            <label for="user_name">Identifiant : </label><input type="text" name="user_name" value="">
            <input type="submit" name="maj" value="Mettre à jour">
        </fieldset>
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/connecte_template.php'); ?>
