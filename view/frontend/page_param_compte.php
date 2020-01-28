<?php $title = 'Paramètres du compte'; ?>

<?php ob_start(); ?>
    <div class="param_compte">
        <h1>Paramètres du compte</h1>
        <p>Modifier les informations de votre compte</p>
        <form class="form_identite" action="?page=paramcompte" method="post">
            <fieldset>
                <label for="nom">Nom</label><input type="text" name="nom" value="<?php echo $infosCompte['nom']; ?>">
                <label for="prenom">Prenom</label><input type="text" name="prenom" value="<?php echo $infosCompte['prenom']; ?>">
                <label for="user_name">Identifiant</label><input type="text" name="user_name" value="<?php echo $infosCompte['user_name']; ?>">
                <input type="submit" name="maj" value="Mettre à jour">
            </fieldset>
        </form>
        <p>Modifier le mot de passe du compte</p>
        <form class="form_identite" action="?page=paramcompte" method="post">
            <fieldset>
                <label for="mdp">Mot de passe</label><input type="password" name="mdp" value="" placeholder="Nouveau mot de passe">
                <label for="confirm_mdp">Confirmer le mot de passe</label><input type="password" name="confirm_mdp" value="" placeholder="Confirmer le nouveau mot de passe">
                <input type="submit" name="maj" value="Mettre à jour">
            </fieldset>
        </form>
        <p>Modifier la question secrète</p>
        <form class="form_identite" action="?page=paramcompte" method="post">
            <fieldset>
                <label for="question">Question</label><input type="text" name="question" value="<?php echo $infosCompte['question']; ?>" >
                <label for="reponse">Reponse</label><input type="text" name="reponse" value="" placeholder="Réponse à votre question">
                <input type="submit" name="maj" value="Mettre à jour">
            </fieldset>
        </form>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/connecte_template.php'); ?>
