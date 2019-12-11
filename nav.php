<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
</head>
<body>
	<div id="pull-right">
	   			<div class="vid">
	   				<div>
	   					<p>S'ORIENTER</p>
	   				</div>
	   				<iframe src="https://www.youtube.com/embed/aoo-boIyIsA" frameborder="0" allowfullscreen></iframe>
	   			</div>

	   			<div class="line-forum">
		   			<table class="forum">
		   				<tbody>
		   					<tr>
		   						<th class="f-header">FORUM</th>
		   					</tr>
						
							<?php while($c = $categories->fetch()) { ?>
		   					<tr>
		   						<td class="main-nav">
		   							<h4><a class="link_forum" href="forum_topic.php?categorie=<?= url_custom_encode($c['nom']) ?>"><?= $c['nom'] ?></h4>
		   						</td>
		   					</tr>
		   					<?php } ?>
		   				</tbody>
		   			</table>
	   			</div>
	   		</div>
</body>
</html>