<?php $title = 'Contact'; ?>

<?php ob_start(); ?>

<div class="contact">
    <h1>Contact</h1>
    <p>Le site est créé par Alexandre Bousquet</p>
    <p>bousquetalexandrepro@gmail.com</p>
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
