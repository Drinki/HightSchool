<?php
require('config.php'); /* Contient la connexion à la $bdd */
require('function.php');
require('function_forum.php');
$categories = $bdd->query('SELECT * FROM f_categories ORDER BY id');
$subcat = $bdd->prepare('SELECT * FROM f_souscategories WHERE id_categorie = ? ORDER BY nom');
require('view/forum.view.php');
?>