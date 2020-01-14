<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
<h1>Connexion</h1>
<form method="post" action="connexion.php">
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
  <a href="../view/frontend/page_inscription.php">Pas encore inscrit ?</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
