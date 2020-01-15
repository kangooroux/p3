<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<h1>Demander la réinitialisation du mot de passe</h1>
<!-- Si $_GET['action'] == 'post' alors on a un formulaire de réponse à la question -->
<form class="" action="index.html" method="post">
    <label for="userName">Saisissez votre nom d'utilisateur:</label><input name="userName" type="text" id="userName" /><br />
    <p><input type="submit" value="Envoyer" /></p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
