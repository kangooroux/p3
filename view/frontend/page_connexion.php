<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>


<section>
    <h1>Connexion</h1>
    <?php if (isset($nouveauMdpSucces) == FALSE): ?>
    <p class="texte_lien_inscription">Vous n'avez pas de compte ? <a href="?page=inscription">S'inscrire</a></p>
    <?php endif; ?>
    <?php if (isset($nouveauMdpSucces)): ?>
    <p>Votre mot de passe a été réinitialisé avec succès</p>
    <?php endif; ?>
    <form method="post" action="index.php">
        <fieldset>
                <label for="identifiant">Nom d'utilisateur :</label><input name="identifiant" type="text" id="identifiant" maxlength="30" required/><br />
                <label for="motDePasse">Mot de Passe :</label><input type="password" name="motDePasse" id="motDePasse" maxlength="30" required/>
                <?php if (isset($mauvaisIdentifiants)): ?>
                <p class="champ_alerte">* Nom d'utilisateur ou mot de passe érroné</p>
                <?php endif; ?>
        </fieldset>
        <p><input type="submit" value="Se connecter" class="submit" /></p>
    </form>
    <?php if (isset($nouveauMdpSucces) == FALSE): ?>
    <a href="?page=oublimdp" class="oublimdp">Mot de passe oublié ?</a>
    <?php endif; ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/login_template.php'); ?>
