<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
<h1>Connexion</h1>
<p class="texte_lien_inscription">Vous n'avez pas de compte ? <a href="../view/frontend/page_inscription.php">S'inscrire</a></p>
<form method="post" action="page_connexion.php">
	<fieldset>
	<legend>Connexion</legend>
	<p>
	<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" /><br />
	<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" />
	</p>
	</fieldset>
	<p><input type="submit" value="Connexion" /></p>
</form>
  <a href="../view/frontend/page_oublimdp.php">Mot de passe oublié ?</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
