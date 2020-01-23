<?php
require_once('controller/controller.php');

try {
    pageActeurs();
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
