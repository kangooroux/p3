<?php $title = 'P3:Extranet'; ?>

<?php ob_start(); ?>

<h1>Demander la réinitialisation du mot de passe</h1>
<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>l" method="post">
    <label for="userNameMdpReset">Saisissez votre nom d'utilisateur:</label><input name="userNameMdpReset" type="text" id="userNameMdpReset" /><br />
    <p><input type="submit" value="Envoyer" /></p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
