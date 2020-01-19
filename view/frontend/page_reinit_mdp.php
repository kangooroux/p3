<?php $title = 'Réinitialisation'; ?>

<?php ob_start(); ?>

<?php if (isset($afficherquestion)): ?>
  <h1>Demander la réinitialisation du mot de passe</h1>
  <p>Veuillez répondre à la question :</p>
  <p><?php echo $verif['question'] ; ?></p>
  <form class="" action="?page=oublimdp" method="post">
      <label for="reponseMdpReset">Saisissez la réponse à la question:</label><input name="reponseMdpReset" type="text" id="reponseMdpReset" required/><br />
      <p><input type="submit" value="Envoyer" class="submit" /></p>
  </form>
<?php endif; ?>

<?php if (isset($mauvaiseReponse)): ?>
  <h1>Demander la réinitialisation du mot de passe</h1>
  <p>Veuillez répondre à la question :</p>
  <p><?php echo $verif['question'] ; ?></p>
  <form class="" action="?page=oublimdp" method="post">
      <label for="reponseMdpReset">Saisissez la réponse à la question:</label><input name="reponseMdpReset" type="textq" id="reponseMdpReset" required/><br />
      <p class="champ_alerte">Cette réponse ne correspond pas à la quetion</p>
      <p><input type="submit" value="Envoyer" class="submit" /></p>
  </form>
<?php endif; ?>

<?php if (isset($afficherNExistePas)): ?>
  <h1>Demander la réinitialisation du mot de passe</h1>
  <form class="" action="?page=oublimdp" method="post">
      <label for="userNameMdpReset">Saisissez votre nom d'utilisateur:</label><input name="userNameMdpReset" type="text" id="userNameMdpReset" required/><br />
      <p class="champ_alerte">Cet identifiant n'existe pas</p>
      <p><input type="submit" value="Envoyer" class="submit" /></p>
  </form>
<?php endif; ?>

<?php if (isset($bonneReponse)): ?>
  <h1>Demander la réinitialisation du mot de passe</h1>
  <p>Veuilliez fournir le nouveau mot de passe</p>
  <form class="" action="?page=oublimdp" method="post">
      <label for="nouveauMdp">Saisissez le nouveau mot de passe :</label><input name="nouveauMdp" type="password" id="nouveauMdp" required/><br />
      <label for="confirmNouveauMdp">Confirmer le nouveau mot de passe :</label><input name="confirmNouveauMdp" type="password" id="confirmNouveauMdp" required/><br />
      <p><input type="submit" value="Envoyer" class="submit" /></p>
  </form>
<?php endif; ?>

<?php if (isset($mdpNonConcordance)): ?>
  <h1>Demander la réinitialisation du mot de passe</h1>
  <p>Veuilliez fournir le nouveau mot de passe</p>
  <form class="" action="?page=oublimdp" method="post">
      <label for="nouveauMdp">Saisissez le nouveau mot de passe :</label><input name="nouveauMdp" type="password" id="nouveauMdp" required/><br />
      <label for="confirmNouveauMdp">Confirmer le nouveau mot de passe :</label><input name="confirmNouveauMdp" type="password" id="confirmNouveauMdp" required/><br />
      <p class="champ_alerte">Le mot de passe et la confirmation du mot de passe ne concorde pas</p>
      <p><input type="submit" value="Envoyer" class="submit" /></p>
  </form>
<?php endif; ?>

<?php if (empty($_POST)): ?>
    <h1>Demander la réinitialisation du mot de passe</h1>
    <form class="" action="?page=oublimdp" method="post">
        <label for="userNameMdpReset">Saisissez votre nom d'utilisateur:</label><input name="userNameMdpReset" type="text" id="userNameMdpReset" required/><br />
        <p><input type="submit" value="Envoyer" class="submit" /></p>
    </form>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>

<?php require('login_template.php'); ?>
