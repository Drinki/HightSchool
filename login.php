<?php

session_start();

require('config.php');

if(isset($_POST['login']))
{
	$maillogin = htmlspecialchars($_POST['maillogin']);
	$passwordlogin = sha1($_POST['passwordlogin']);
	if(!empty($maillogin) AND !empty($passwordlogin))
	{
		$requser= $bdd->prepare("SELECT * FROM user WHERE mail=? AND password=?");
		$requser->execute(array($maillogin, $passwordlogin));
		$userexist = $requser->rowCount();
		if($userexist ==1 )
		{
			$userinfo = $requser->fetch();
			$_SESSION['id_user']=$userinfo['id_user'];
			$_SESSION['pseudo']=$userinfo['pseudo'];
			$_SESSION['mail']=$userinfo['mail'];
			header("Location: profil.php?id=".$_SESSION['id_user']);
		}
		else
		{
			$erreur="Adresse mail ou mot de passe invalide";
		}

	}
	else
	{
		$erreur="Tout les champs doivent être complétés";
	}
}
?>



<DOCTYPE! html>
<html>
	<head>
		<title>Connexion - HighSchool.com</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style_head.css" />
	</head>
	
	<?php	//En tête du site. // 
	require('head.php');
	?>

	<body>
		<div align="center">
			<h2>Connexion</h2>
			
			<br><br>
			
			<?php
				if (isset($erreur)) 
				{
					echo $erreur;
				}
			?>
			
			<br><br>
			
			<div class="log">
				<br/>
				<form method="POST" action="">
					<label>Adresse mail :</label><br/>
					<input type="email" name="maillogin" placeholder="Adresse mail" class="linput" size="50"><br/><br/>
					<label>Mot de passe :</label><br/>
					<input type="password" name="passwordlogin" placeholder="Mot de passe" class="linput" size="50"><br/><br/>
					<input type="submit" name="login" value="Se connecter" id="lsubmit" size="20"><br/>
					
				</form>
				
				<br/>
				<p>Pas encore de compte ? <a href="register.php">Inscription ici</a></p>
				<br>

			</div>
			<br>
			
		</div>

	<?php
	require('footer.php');
	?>

	</body>


</html>