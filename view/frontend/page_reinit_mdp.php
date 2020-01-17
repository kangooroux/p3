<?php $title = 'Réinitialisation'; ?>

<?php ob_start(); ?>

<?php

if (isset($_POST['userNameMdpReset'])) {
  echo '<h1>Demander la réinitialisation du mot de passe</h1>
  <p>Veuilliez répondre à la question</p>
  <form class="" action="?page=oublimdp" method="post">
      <label for="questionMdpReset">Saisissez la réponse à la question:</label><input name="questionMdpReset" type="text" id="questionMdpReset" required/><br />
      <p><input type="submit" value="Envoyer" class="submit" /></p>
  </form>';
}
elseif (isset($_POST['questionMdpReset'])) {
  echo '<h1>Demander la réinitialisation du mot de passe</h1>
  <p>Veuilliez fournir le nouveau mot de passe</p>
  <form class="" action="?page=oublimdp" method="post">
      <label for="nouveauMdp">Saisissez le nouveau mot de passe:</label><input name="nouveauMdp" type="text" id="nouveauMdp" required/><br />
      <p><input type="submit" value="Envoyer" class="submit" /></p>
  </form>';
}
elseif (isset($_POST['nouveauMdp'])) {
  echo '<h1>Connexion</h1>
  <p>Votre mot de passe a été réinitialisé avec succès</p>
  <form method="post" action="?page=oublimdp">
  	<fieldset>
  	<p>
  	<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" required/><br />
  	<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" required/>
  	</p>
  	</fieldset>
  	<p><input type="submit" value="Se connecter" class="submit" /></p>
  </form>';
}
else {
  echo '<h1>Demander la réinitialisation du mot de passe</h1>
        <form class="" action="?page=oublimdp" method="post">
            <label for="userNameMdpReset">Saisissez votre nom d\'utilisateur:</label><input name="userNameMdpReset" type="text" id="userNameMdpReset" required/><br />
            <p><input type="submit" value="Envoyer" class="submit" /></p>
        </form>';
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
