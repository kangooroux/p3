<?php $title = 'P3:Extranet'; ?>

<?php ob_start(); ?>

<h1>Demander la réinitialisation du mot de passe</h1>
<p>Veuilliez fournir le nouveau mot de passe</p>
<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>l" method="post">
    <label for="nouveauMdp">Saisissez le nouveau mot de passe:</label><input name="nouveauMdp" type="text" id="nouveauMdp" /><br />
    <p><input type="submit" value="Envoyer" /></p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
