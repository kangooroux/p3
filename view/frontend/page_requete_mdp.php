<?php $title = 'P3:Extranet'; ?>

<?php ob_start(); ?>

<h1>Demander la réinitialisation du mot de passe</h1>
<p>Veuilliez répondre à la question</p>
<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>l" method="post">
    <label for="questionMdpReset">Saisissez la réponse à la question:</label><input name="questionMdpReset" type="text" id="questionMdpReset" /><br />
    <p><input type="submit" value="Envoyer" /></p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
