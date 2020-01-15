<?php

// Va chercher la page de Connexion
function connexion()
{
  require('../view/frontend/page_connexion.php');
}

function inscription()
{

  require('../view/frontend/page_inscription.php');
}

function oublimdp()
{
  // à faire: Requète base de données pour la question
  require('../view/frontend/page_oublimdp.php');
}

function inscriptionReussie()
{
  // à faire: Requètes base de données pour inscription
  require('../view/frontend/page_inscription_reussie.php');
}

 ?>
