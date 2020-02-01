<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

<h1>Inscription</h1>
    <section>
        <form class="" action="index.php" method="post">
            <fieldset>
                <label for="nom">Nom :</label><input name="nom" type="text" id="nom" maxlength="100" required/><br />
                <label for="prenom">Prénom :</label><input name="prenom" type="text" id="prenom" maxlength="100" required/><br />
                <label for="userName">Nom d'utilisateur :</label><input name="userName" type="text" id="userName" maxlength="30" pattern="[A-Za-z0-9_]{4,30}" required/><br />
                <p class="exigences_saisies"> *Votre nom d'utilisateur doit comporter au moins 4 caractères et un maximum de 30 caractères. Ne peut comporter que les lettres de a à z et les chiffres de 0 à 9.</p>
                <?php if (isset($afficherDoublon)): ?>
                <p class="champ_alerte">* Identifiant déja utilisé</p>
                <?php endif; ?>
                <label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" minlength="4" maxlength="30" required/><br />
                <label for="confirmMdp">Confirmer votre mot de passe :</label><input type="password" name="confirmMdp" id="confirmMdp" minlength="4" maxlength="30" required/><br />
                <p class="exigences_saisies"> *Votre mot de passe doit comporter au moins 4 caractères et un maximum de 30 caractères.</p>
                <?php if (isset($afficherNonConcordance)): ?>
                <p class="champ_alerte">* Le mot de passe et la confirmation du mot de passe ne concorde pas</p>
                <?php endif; ?>
                <label for="questionSecrete">Veuillez saisir un question secrète :</label><input name="questionSecrete" type="text" id="questionSecrete" maxlength="150" placeholder="150 caractères max." required/><br />
                <label for="reponseSecrete">Veuillez saisir la réponse à cette question :</label><input name="reponseSecrete" type="text" id="reponseSecrete" maxlength="150" placeholder="150 caractères max." required/><br />
            </fieldset>
            <p><input type="submit" value="S'inscrire" class="submit" /></p>
        </form>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/login_template.php'); ?>
