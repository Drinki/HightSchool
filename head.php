<?php
session_start();

if(isset($_SESSION['id_user'])) {
	$log="DECONNEXION";
	$dis="disconnection.php";
	$pro="profil.php";
}
else{
	$log="INSCRIPTION";
	$dis="register.php";
	$pro="login.php";
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<header id="header_page"> <!--En tête de la page-->
		
		<div class="top_header">
			<div class="block">
				<div id="logo">
					<a href="index.php">
						<img class="logo" src="Images/highschool_bande.png" >
					</a>
				</div>

				<div id="menu"> <!--Barre de navigation-->
	  				<ul id="onglets">
		    			<li class="windows"><a href="index.php"><b> ACCUEIL </b></a></li>
					    <li class="windows"><a href="forum.php"><b> FORUM </b></a></li>
					    <li class="windows"><a href="<?= $pro ?>"><b> PROFIL </b></a></li>
					    <li class="windows"><a href="login.php"><b> CONNEXION </b></a></li>
					    <li class="windows"><a href="<?= $dis ?>"><b> <?= $log ?> </b></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="bottom_header">
			<div class="block">
				<div class="toolbar">
					<span><a class="info" href="infos.php">INFOS </a></span>
					<div class="carrousel">
						<div class="caroussel_mouv" style="display: block; text-align: start; float: none; position: relative; top: auto; right: auto; bottom: auto; left: auto; z-index: auto; width: 640px; height: 23px; margin: 0px; overflow: hidden;">
							<ul class="carrousel_1" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 3200px; height: 23px; z-index: auto;">
								<li style="margin-right: 20px;" class="textinfo">
									<a class="mouv" href="register.php">- Insrcis toi dès maintenant</a>
								</li>
								<li style="margin-right: 20px;" class="textinfo">
									<p >-Le site est en cour de développement</p>
								</li>
								<li style="margin-right: 20px;" class="textinfo">
									<p>-Entièrement gratuit</p>
								</li>
								<li style="margin-right: 20px;" class="textinfo">
									<a href="forum.php">-Parcours le forum pour trouver des réponses</a>
								</li>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
<br><br>
	<div id="content" class="block">
		<div id="main-content">
			<div class="f-left">
				
				
				
			</div>
		</div>
	</div>
</body>
</html>