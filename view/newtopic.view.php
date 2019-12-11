<!DOCTYPE html>
<html>
<head>
	<title><?= $categorie ?> Nouveau Topics - HighSchool.com</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style_head.css" />
</head>
<body>
	
	<?php	//En tête du site. // 
	require('head.php');
	?>
	
<br><br>
	<div id="content" class="block">
		<div id="main-content">
			<div class="f-left">
				<form method="POST">
					<table class="forum" id="topic">
						<tbody>
							<tr class="f-header">
								<th class="f-categorie">NOUVEAU TOPIC</th>
								<th></th>
							</tr>
							<tr>
								<td><b>Sujet</b></td>
								<td>
									<input name="tsujet" type="text" size="70" maxlength="70" id="tsujet" placeholder="Le nom de ton sujet">
								</td>
							</tr>
							<tr>
								<td><b>Catégorie</b></td>
								<td>
									<?= $categorie ?>
								</td>
							</tr>
							<tr>
								<td><b>Sous-Catégorie</b></td>
								<td>
									<select  class="tcategorie" name="souscategorie">
										<?php while($sc = $souscategories->fetch()) { ?>
											<option value="<?= $sc['id'] ?>"><?= $sc['nom'] ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><b>Message</b></td>
								<td>
									<textarea class="textarea" name="tcontenu" rows="10" cols="90" placeholder="Ecris ton message ici"></textarea>
								</td>
							</tr>
							<tr>
								<td><b>Notification par mail</b></td>
								<td>
									<input type="checkbox" name="tmail">
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="tsubmit" value="Poster le topic" id="tsubmit">
								</td>
							</tr>
						</tbody>
					</table>
				</form>	
				
				<?php if(isset($terror)) { ?>
				<?= $terror ?>
				<?php } ?>

			</div>
		</div>
	</div>
<footer class="forum_footer">
<?php 
	require('footer.php');
?>
</footer>
</body>
</html>