<!DOCTYPE html>
<html>
   <head>
      <title><?= $c['nom'] ?> Topics - HighSchool.com</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="css/style_head.css" />
   </head>
   <body>
      
   <!--En tête du site.-->
   <?php 
   require('head.php');
   ?>

   <br><br>
      <div id="content" class="block">
         <div id="main-content">
            <div class="f-left">
               <table class="forum">
                  <tbody>
                     <tr class="f-header">
                        <th class="f-categorie">SUJET</th>
                        <th class="f-other">NOMBRE DE RÉPONSE</th>
                        <th class="f-other">DERNIER MESSAGE</th>
                        <th class="f-other">DATE DE CREATION</th>
                     </tr>
                     
                     <?php while($t = $topics->fetch()) { ?>

                     <tr class="categorie">
                        <td class="main">
                           <h4><a href=""><a href="topic.php?titre=<?= url_custom_encode($t['sujet']) ?>&id=<?= $t['topic_base_id'] ?>"><?= $t['sujet'] ?></a></a></h4>
                        </td>
                        <td class="sub-info"><?= reponse_nbr_topic($t['topic_base_id']) ?></td>
                        <td class="sub-info"><?= derniere_reponse_topic($t['topic_base_id']) ?></td>
                        <td class="sub-info"><?= $t['date_heure_creation'] ?> par <?= $t['pseudo'] ?></td>
                     </tr>

                     <?php } ?>

                  </tbody>
               </table>
                  <div id="newtopic">
                     <a href="newtopic.php?categorie=<?= $id_categorie ?>">Créer un nouveau topic dans<br><?= $get_categorie ?></a>
                  </div>
            </div>
         </div>
      </div>
      <footer class="forum_footer">
      <?php //Bas de page.//
      require('footer.php');
      ?>
      </footer>
	  
   </body>
</html>