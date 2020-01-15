<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
<h1>Inscription</h1>
<form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="nom">Nom :</label><input name="nom" type="text" id="nom" /><br />
    <label for="prenom">Prénom :</label><input name="prenom" type="text" id="prenom" /><br />
    <label for="userName">Nom d'utilisateur :</label><input name="userName" type="text" id="userName" /><br />
    <label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" /><br />
    <label for="questionSecrete">Veuillez saisir un question secrète :</label><input name="questionSecrete" type="text" id="questionSecrete" /><br />
    <label for="reponseSecrete">Veuillez saisir la réponse à cette question :</label><input name="reponseSecrete" type="text" id="reponseSecrete" /><br />
    <p><input type="submit" value="S'inscrire" /></p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
