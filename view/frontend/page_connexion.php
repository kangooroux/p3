<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<?php if ((empty($_POST)) && empty(($_GET))): ?>
    <h1>Connexion</h1>
    <section>
        <p class="texte_lien_inscription">Vous n'avez pas de compte ? <a href="p3extranet.php/?page=inscription">S'inscrire</a></p>
        <form method="post" action="?page=connexion">
            <fieldset>
                <label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" required/><br />
                <label for="motDePasse">Mot de Passe :</label><input type="password" name="motDePasse" id="motDePasse" required/>
            </fieldset>
            <p><input type="submit" value="Se connecter" class="submit" /></p>
        </form>
        <a href="p3extranet.php/?page=oublimdp" class="oublimdp">Mot de passe oublié ?</a>
    </section>
<?php endif; ?>

<?php if (isset($nouveauMdpSucces)): ?>
    <h1>Connexion</h1>
    <p>Votre mot de passe a été réinitialisé avec succès</p>
    <form method="post" action="?page=connexion">
      	<fieldset>
              	<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" required/><br />
              	<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" required/>
      	</fieldset>
      	<p><input type="submit" value="Se connecter" class="submit" /></p>
    </form>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('login_template.php'); ?>
