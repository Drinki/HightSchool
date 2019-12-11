<!DOCTYPE html>
<html>
   <head>
      <title>HighSchool.com</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="css/style_head.css" />
   </head>
   <body>
   
	   <!--En tête du site.-->
	    <?php 
	   		include('head.php');
	    ?>

	   	<div id="content" class="block">
	   		<div class="pull_left">
				<br>
				<div class="first_line">
					<p>VOUS ÊTES ICI : <a href="index.php">ACCUEIL</a></p> 
				</div>

				<div class="pull_news">
					<h2>ACTUALITÉS</h2>

			   		<!--Actu 1-->
			   		<a href="http://www.europe1.fr/societe/admissions-post-bac-pourquoi-les-filles-veulent-elles-toujours-etre-infirmieres-et-les-garcons-ingenieurs-3214013" target="_blank">
			   			<img class="news" src="Images/1.png">
			   		</a>

			   		<!--Actu 2-->
			   		<a href="http://www.francetvinfo.fr/replay-radio/question-d-education/admissions-post-bac-vers-quelles-filieres-s-orientent-les-lyceens_2118827.html" target="_blank">
			   			<img class="news" src="Images/2.png">
			   		</a>

			   		<!--Actu 3-->
			   		<a href="http://www.leclaireurdechateaubriant.fr/2017/04/03/publireportage-nouvelle-formation-post-bac-a-la-maison-familiale-rurale-de-chateaubriant/" target="_blank">
			   			<img class="news" src="Images/3.png">
			   		</a>

			   		<!--Actu 4-->
			   		<a href="https://www.digischool.fr/bac/debouches-bac-technologique-stmg-201.php" target="_blank">
			   			<img class="news" src="Images/4.png">
			   		</a>

		   		</div>

		   		<div class="pull_info">
		   			<h2>INFOS</h2>

		   			<p class="info_text" style="text-indent: 25px;">Bienvenue sur le site internet : HighSchool, notre forum de discussion sur les formations post-bac qui parcourt tous les domaines : des écoles spécialisées, des licences, des BTS, DUT… Ce forum est public, toute personne se posant des questions sur son avenir ou juste des renseignements sur différentes formations peut accéder à l'ensemble des discussions disponibles et y participer. Il peut également créer ses propres sujets de discussions afin de les proposer aux autres utilisateurs. Tu veux des renseignements ? <a href="register.php">Créer un compte </a> et lance-toi !</p>

		   			<p>->Plus d'infos <a href="infos.php">ici</a></p>
		   		</div>
	   		</div>

	   		<?php
	   			include('nav.php');
	   		?>

	   	</div>
		
		<!--Bas de page-->
		<?php 
	   		include('footer.php');
	   ?>

   </body>
</html>
