<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
<h1>Connexion</h1>
<p class="texte_lien_inscription">Vous n'avez pas de compte ? <a href="index.php/?page=inscription">S'inscrire</a></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<fieldset>
	<p>
	<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" /><br />
	<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" />
	</p>
	</fieldset>
	<p><input type="submit" value="Connexion" /></p>
</form>
  <a href="index.php/?page=oublimdp">Mot de passe oublié ?</a>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
