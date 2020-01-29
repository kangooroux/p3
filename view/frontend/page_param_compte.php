<?php $title = 'Paramètres du compte'; ?>

<?php ob_start(); ?>
    <div class="param_compte">
        <?php if (isset($infosModif)): ?>
            <p class="modif_param_succes">Vos informations ont été modifiées</p>
        <?php elseif (isset($modifMdp)): ?>
            <p class="modif_param_succes">Votre mot de passe a été modifié</p>
        <?php elseif (isset($modifQR)): ?>
            <p class="modif_param_succes">Votre question et votre réponse ont été modifiées</p>
        <?php endif; ?>
        <h1>Paramètres du compte</h1>
        <p>Modifier les informations de votre compte</p>
        <form class="form_identite" action="?page=paramcompte" method="post">
            <fieldset>
                  <label for="nom">Nom</label><input type="text" name="nom" value="<?php echo $infosCompte['nom']; ?>" required/>
                  <label for="prenom">Prenom</label><input type="text" name="prenom" value="<?php echo $infosCompte['prenom']; ?>" required/>
                  <label for="user_name">Identifiant</label><input type="text" name="user_name" value="<?php echo $infosCompte['user_name']; ?>" required/>
                  <input type="submit" name="maj" value="Mettre à jour">
            </fieldset>
        </form>
        <p>Modifier le mot de passe du compte</p>
        <form class="form_identite" action="?page=paramcompte" method="post">
            <fieldset>
                <label for="mdp">Mot de passe</label><input type="password" name="mdp" value="" placeholder="Nouveau mot de passe" required/>
                <label for="confirm_mdp">Confirmer le mot de passe</label><input type="password" name="confirm_mdp" value="" placeholder="Confirmer le nouveau mot de passe" required/>
                <?php if (isset($mdpNonConcordance)): ?>
                    <p class="champ_alerte">* Le mot de passe et la confirmation du mot de passe ne concorde pas</p>
                <?php endif; ?>
                <input type="submit" name="maj" value="Mettre à jour">
            </fieldset>
        </form>
        <p>Modifier la question secrète</p>
        <form class="form_identite" action="?page=paramcompte" method="post">
            <fieldset>
                <label for="question">Question</label><input type="text" name="question" value="<?php echo $infosCompte['question']; ?>" required/>
                <label for="reponse">Reponse</label><input type="text" name="reponse" value="" placeholder="Réponse à votre question" required/>
                <input type="submit" name="maj" value="Mettre à jour">
            </fieldset>
        </form>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/connecte_template.php'); ?>
