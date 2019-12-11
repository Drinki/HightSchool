<?php 
require('config.php');
require('function.php');
$categories = $bdd->query('SELECT * FROM f_categories ORDER BY nom');

require('view/index.view.php');

?>