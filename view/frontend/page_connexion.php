<?php $title = 'P3:Extranet'; ?>

<?php ob_start(); ?>

<?php
try {
  if (isset($_POST['identifiant']) && ($_POST['mdp'])) {
    // page connecté
  }
  elseif (isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['userName']) && ($_POST['mdp']) && ($_POST['questionSecrete']) && ($_POST['reponseSecrete'])) {
    echo '<section>
    		<p>Votre inscription s\'est faite avec succès</p>
    		<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
    				<fieldset>
    						<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" /><br />
    						<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" />
    				</fieldset>
    				<p><input type="submit" value="Se connecter" class="submit" /></p>
    		</form>
    </section>';
  }
  elseif (isset($_POST['userNameMdpReset'])) {
    echo '<h1>Demander la réinitialisation du mot de passe</h1>
    <p>Veuilliez répondre à la question</p>
    <form class="" action="' .  htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
        <label for="questionMdpReset">Saisissez la réponse à la question:</label><input name="questionMdpReset" type="text" id="questionMdpReset" /><br />
        <p><input type="submit" value="Envoyer" class="submit" /></p>
    </form>';
  }
  elseif (isset($_POST['questionMdpReset'])) {
    echo '<h1>Demander la réinitialisation du mot de passe</h1>
    <p>Veuilliez fournir le nouveau mot de passe</p>
    <form class="" action="' .  htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
        <label for="nouveauMdp">Saisissez le nouveau mot de passe:</label><input name="nouveauMdp" type="text" id="nouveauMdp" /><br />
        <p><input type="submit" value="Envoyer" class="submit" /></p>
    </form>';
  }
  elseif (isset($_POST['nouveauMdp'])) {
    echo '<h1>Connexion</h1>
    <p>Votre mot de passe a été réinitialisé avec succès</p>
    <form method="post" action="' .  htmlspecialchars($_SERVER["PHP_SELF"]) . '">
    	<fieldset>
    	<p>
    	<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" /><br />
    	<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" />
    	</p>
    	</fieldset>
    	<p><input type="submit" value="Se connecter" class="submit" /></p>
    </form>';
  }
  elseif (isset($_GET['page'])) {
    if ($_GET['page'] == 'inscription') {
        echo '<h1>Inscription</h1>
        <section>
            <form class="" action="' .  htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                <fieldset>
                    <label for="nom">Nom :</label><input name="nom" type="text" id="nom" /><br />
                    <label for="prenom">Prénom :</label><input name="prenom" type="text" id="prenom" /><br />
                    <label for="userName">Nom d\'utilisateur :</label><input name="userName" type="text" id="userName" /><br />
                    <label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" /><br />
                    <label for="questionSecrete">Veuillez saisir un question secrète :</label><input name="questionSecrete" type="text" id="questionSecrete" /><br />
                    <label for="reponseSecrete">Veuillez saisir la réponse à cette question :</label><input name="reponseSecrete" type="text" id="reponseSecrete" /><br />
                </fieldset>
                <p><input type="submit" value="S\'inscrire" class="submit" /></p>
            </form>
        </section>';
    }
    elseif ($_GET['page'] == 'oublimdp') {
        echo '<h1>Demander la réinitialisation du mot de passe</h1>
        <form class="" action="' .  htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
            <label for="userNameMdpReset">Saisissez votre nom d\'utilisateur:</label><input name="userNameMdpReset" type="text" id="userNameMdpReset" /><br />
            <p><input type="submit" value="Envoyer" class="submit" /></p>
        </form>';
    }
  }
  else {
    echo '<h1>Connexion</h1>
    <section>
    		<p class="texte_lien_inscription">Vous n\'avez pas de compte ? <a href="index.php/?page=inscription">S\'inscrire</a></p>
    		<form method="post" action="' .  htmlspecialchars($_SERVER["PHP_SELF"]) . '">
    				<fieldset>
    						<label for="identifiant">Identifiant :</label><input name="identifiant" type="text" id="identifiant" /><br />
    						<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" />
    				</fieldset>
    				<p><input type="submit" value="Se connecter" class="submit" /></p>
    		</form>
    		<a href="index.php/?page=oublimdp" class="oublimdp">Mot de passe oublié ?</a>
    </section>';
  }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('../view/errorView.php');
}
 ?>

 <?php $content = ob_get_clean(); ?>

 <?php require('template.php'); ?>
