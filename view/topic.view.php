<!DOCTYPE html>
<html>
   <head>
      <title><?= $topic['sujet'] ?> Topic-HighSchool.com</title>
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
								<th class="f-auteur">AUTEUR</th>
								<th class="f-sujet">SUJET : <?= $topic['sujet'] ?></th>
							</tr>

							<tr class="f-rep">
							 	<td><?= get_pseudo($topic['id_createur']) ?> :</td>
							 	<td><?= $topic['contenu'] ?></td>
							</tr>
							<?php while($r = $reponses->fetch()) { ?>
							<tr class="f-rep">
								 <td><?= get_pseudo($r['id_posteur']) ?> :</td>
								 <td><?= $r['contenu'] ?></td>
							</tr>
							<?php } ?>
						</tbody>
				   </table>
				   <?php
				      for($i=1;$i<=$pagesTotales;$i++) {
				         if($i == $pageCourante) {
				            echo $i.' ';
				         } else {
				            echo '<a href="topic.php?titre='.$get_titre.'&id='.$get_id.'&page='.$i.'">'.$i.'</a> ';
				         }
				      }
				   ?>
					
				   <br>
				    
				    <?php if(isset($_SESSION['id_user'])) { ?>
					   
					   <form method="POST">
					      <textarea class="textarea" placeholder="Votre réponse" name="topic_reponse" style="width:80%"><?php if(isset($reponse)) { echo $reponse; } ?></textarea><br />
					      <input type="submit" name="topic_reponse_submit" value="Poster ma réponse" id="lsubmit"></form>
					   </form>
					   
					   <?php if(isset($reponse_msg)) { echo $reponse_msg; } ?>
						
					<?php } else { ?>
					   	<br><p>Veuillez vous <a href="login.php">connecter</a> ou <a href="register.php">créer un compte</a> pour poster une réponse</p>
					<?php } ?>

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