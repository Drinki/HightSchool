<!DOCTYPE html>
<html>
   <head>
      <title>Forum - HighSchool.com</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="css/style_head.css" />
   </head>
   
   <body>
     
	   <?php //En tête du site. // 
	   		include('head.php');
	   ?>

	   <br><br>
		  
		  <div id="content" class="block">
			 <div id="main-content">
				<div class="f-left">
				   <table class="forum">
					  <tbody>
						 <tr class="f-header">
							<th class="f-categorie">CATEGORIES</th>
							<th class="f-other">NOMBRE DE MESSAGE</th>
							<th class="f-other">VUES</th>
							<th class="f-other">DERNIER MESSAGE</th>
						 </tr>
						 
						 <?php
						
						 while($c = $categories->fetch()) { 
							$subcat->execute(array($c['id']));
							$souscategories = '';
							while($sc = $subcat->fetch()) { 
								  $souscategories .= '<a href="forum_topic.php?categorie='.url_custom_encode($c['nom']).'&souscategorie='.url_custom_encode($sc['nom']).'">'.$sc['nom'].'</a> | ';
							}
							$souscategories = substr($souscategories, 0, -3);
						 ?>


						 <tr class="categorie">
							<td class="main">
							   <h4><a class="link_forum" href="forum_topic.php?categorie=<?= url_custom_encode($c['nom']) ?>"><?= $c['nom'] ?></a></h4>
							   <p>
								  <?= $souscategories ?>
							   </p>
							</td>
							<td class="sub-info"><?= reponse_nbr_categorie($c['id']) ?></td>
							<td class="sub-info"></td>
							<td class="sub-info"><?= derniere_reponse_categorie($c['id']) ?></td>
						 </tr>
						 
						 <?php } ?>

					  </tbody>
				   </table>
				  </div>
			 </div>
		  </div>
		<footer class="forum_footer">
		<?php //Bas de page // 
			include('footer.php');
		?>
		</footer>

   </body>
</html>