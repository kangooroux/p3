<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<h1>Inscription</h1>
    <section>
        <form class="" action="?page=inscription" method="post">
            <fieldset>
                <label for="nom">Nom :</label><input name="nom" type="text" id="nom" required/><br />
                <label for="prenom">Prénom :</label><input name="prenom" type="text" id="prenom" required/><br />
                <label for="userName">Nom d'utilisateur :</label><input name="userName" type="text" id="userName" required/><br />
                <?php if (isset($doublon)): ?>
                <p class="champ_alerte">Identifiant déja utilisé</p>
                <?php endif; ?>
                <label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" required/><br />
                <label for="questionSecrete">Veuillez saisir un question secrète :</label><input name="questionSecrete" type="text" id="questionSecrete" required/><br />
                <label for="reponseSecrete">Veuillez saisir la réponse à cette question :</label><input name="reponseSecrete" type="text" id="reponseSecrete" required/><br />
            </fieldset>
            <p><input type="submit" value="S'inscrire" class="submit" /></p>
        </form>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
