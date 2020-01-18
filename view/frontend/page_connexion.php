<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<?php
if (isset($_POST['identifiant']) && ($_POST['mdp'])) {
  // page connecté
}
elseif (isset($_GET['page'])) {
    if ($_GET['page'] == 'inscriptionsucces') {
      echo '<section>
      		<p>Votre inscription s\'est faite avec succès</p>
      		<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
      				<fieldset>
      						<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" required/><br />
      						<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" required/>
      				</fieldset>
      				<p><input type="submit" value="Se connecter" class="submit" /></p>
      		</form>
      </section>';
    }
    else {
      echo "Pas de page GET";
    }
}
else {
    echo '<h1>Connexion</h1>
    <section>
    		<p class="texte_lien_inscription">Vous n\'avez pas de compte ? <a href="index.php/?page=inscription">S\'inscrire</a></p>
    		<form method="post" action="' .  htmlspecialchars($_SERVER["PHP_SELF"]) . '">
    				<fieldset>
    						<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" required/><br />
    						<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" required/>
    				</fieldset>
    				<p><input type="submit" value="Se connecter" class="submit" /></p>
    		</form>
    		<a href="index.php/?page=oublimdp" class="oublimdp">Mot de passe oublié ?</a>
    </section>';
}
 ?>

 <?php $content = ob_get_clean(); ?>

 <?php require('login_template.php'); ?>
