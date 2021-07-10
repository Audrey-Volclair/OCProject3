<?php
session_start();

// Suppression des variables de session
$_SESSION = array();
session_destroy();
header('location:connexion_page.php');

?>