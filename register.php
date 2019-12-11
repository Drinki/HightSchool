<?php
session_start();
require('config.php');

if(isset($_POST['forminscription']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);
	$mail_2 = htmlspecialchars($_POST['mail_2']);
	$password = sha1($_POST['password']);
	$password_2 = sha1($_POST['password_2']);


	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail_2']) AND !empty($_POST['password']) AND !empty($_POST['password_2']))
	{

		$reqpseudo = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
        $reqpseudo->execute(array($pseudo));
        $pseudoexist = $reqpseudo->rowCount();
        if($pseudoexist==0)
        {
			$pseudolenght = strlen($pseudo);
			if($pseudolenght <= 255)
			{
					if($mail==$mail_2)
					{
						if(filter_var($mail, FILTER_VALIDATE_EMAIL))
						{
							$reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
		               		$reqmail->execute(array($mail));
		               		$mailexist = $reqmail->rowCount();
							if($mailexist ==0)
							{
								if($password==$password_2)
								{
									$insertmbr = $bdd->prepare("INSERT INTO user(pseudo, mail, password) VALUES(?, ?, ?)");
			            $insertmbr->execute(array($pseudo, $mail, $password));
			            $erreur = "Votre compte a bien été créé ! <a href=\"login.php\">Me connecter</a>";
								}
								else
								{
									$erreur="Vos mot de passe ne sont pas identiques";
								}
							}
							else
							{
								$erreur="Adresse mail déjà utilisée";
							}
						}
						else
						{
							$erreur="Votre adresse mail n'est pas valide";
						}
					}
					else
					{
							$erreur ="Vos adresses mail ne sont pas identiques";
					}
			}
			else
			{
					$erreur = "Votre pseudo ne doit pas dépacer 255 caractères";
			}
		}
		else
		{
			$erreur = "Ce pseudo est déjà utilisé";
		}
	}
	else
	{
		$erreur = "Tout les champs doivent être complétés";
	}
}
?>



<DOCTYPE! html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style_head.css" />
		<title>Inscription - HighSchool.com</title>
	</head>

	<body>

	<?php	//En tête du site. //
	require('head.php');
	?>

<br><br>

	<div id="content" class="block">
		<div id="main-content">
			<div class="f-left">



			</div>
		</div>
	</div>


		<div align="center">
			<h2>Inscription</h2>
			<br /><br /><br />
			<form method="POST" action="">
				<div class="reg">
				<br/>
				<table>
<!--Pseudo-->
					<tr>
						<td align="right">
							<label for="pseudo">Pseudo :</label>
						</td>
						<td align="right">
							<input type="text" placeholder="Votre pseudo" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" class="linput"><br/>
						</td>
					</tr>
<!--Mail-->
					<tr>
						<td align="right">
							<label for="mail">Mail :</label>
						</td>
						<td align="right">
							<input type="email" placeholder="Votre mail" name="mail" id="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" class="linput"><br/>
						</td>
					</tr>
<!--Confimation du mail-->
					<tr>
						<td align="right">
							<label for="mail_2">Confirmation du mail :</label>
						</td>
						<td align="right">
							<input type="email" placeholder="Confirmez votre mail" name="mail_2" id="mail_2" value="<?php if(isset($mail_2)) { echo $mail_2; } ?>" class="linput"><br/>
						</td>
					</tr>
<!--Mot de passe-->
					<tr>
						<td align="right">
							<label for="password">Mot de passe :</label>
						</td>
						<td align="right">
							<input type="password" placeholder="Votre mot de passe" name="password" id="password" class="linput"><br/>
						</td>
					</tr>
<!--Confimation du mot de passe-->
					<tr>
						<td align="right">
							<label for="password_2">Confimation du mot de passe :</label>
						</td>
						<td align="right">
							<input type="password" placeholder="Confirmez votre mot de passe" name="password_2" id="password_2" class="linput"><br/>
						</td>
					</tr>
<!--Inscription-->
					<tr>
						<td></td>
						<td align="center"><br></b><input type="submit" value="S'inscrire" name="forminscription" id="lsubmit"></td>
					</tr>
				</table>
				<br/>
				</div>
			</form>

			<?php
				if (isset($erreur))
				{
					echo $erreur;
				}
			?>
		</div>

	<?php
	require('footer.php');
	?>

	</body>

</html>
