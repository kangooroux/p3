<?php $title = 'Réinitialisation'; ?>

<?php ob_start(); ?>

<h1>Demander la réinitialisation du mot de passe</h1>
<?php if ((isset($afficherquestion)) || (isset($mauvaiseReponse))): ?>
  <p class="reinitMdpInstructions">Veuillez répondre à la question suivante:</p>
  <p class="reinitMdpInstructions"><?php echo $verif['question'] ; ?> ?</p>
<?php elseif ((isset($bonneReponse)) || (isset($mdpNonConcordance))): ?>
  <p class="reinitMdpInstructions">Veuilliez fournir le nouveau mot de passe</p>
<?php endif; ?>
<form class="" action="?page=oublimdp" method="post">
    <?php if ((isset($afficherquestion)) || (isset($mauvaiseReponse))): ?>
      <label for="reponseMdpReset">Saisissez la réponse à la question:</label><input name="reponseMdpReset" type="text" id="reponseMdpReset" required/><br />
    <?php elseif ((isset($bonneReponse)) || (isset($mdpNonConcordance))): ?>
      <label for="nouveauMdp">Saisissez le nouveau mot de passe :</label><input name="nouveauMdp" type="password" id="nouveauMdp" required/><br />
      <label for="confirmNouveauMdp">Confirmer le nouveau mot de passe :</label><input name="confirmNouveauMdp" type="password" id="confirmNouveauMdp" required/><br />
    <?php elseif ((empty($_POST)) || isset($afficherNExistePas)): ?>
      <label for="userNameMdpReset">Saisissez votre nom d'utilisateur:</label><input name="userNameMdpReset" type="text" id="userNameMdpReset" required/><br />
    <?php endif; ?>
    <?php if (isset($mauvaiseReponse)): ?>
      <p class="champ_alerte">* Cette réponse ne correspond pas à la quetion</p>
    <?php elseif (isset($mdpNonConcordance)): ?>
      <p class="champ_alerte">* Le mot de passe et la confirmation du mot de passe ne concorde pas</p>
    <?php elseif (isset($afficherNExistePas)): ?>
      <p class="champ_alerte">* Cet identifiant n'existe pas</p>
    <?php endif; ?>
    <p><input type="submit" value="Envoyer" class="submit" /></p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('login_template.php'); ?>
