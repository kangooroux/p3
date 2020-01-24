<?php $title = 'Mention légales'; ?>

<?php ob_start(); ?>

<div class="mentions_legales">
    <h1>Mention légales</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<?php $content = ob_get_clean(); ?>

<?php
if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
    require('view/frontend/connecte_template.php');
}
else {
    require('view/frontend/login_template.php');
}
?>
