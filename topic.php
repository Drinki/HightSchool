<?php

require('config.php');
require('function.php');
require('function_forum.php');

if(isset($_GET['titre'],$_GET['id']) AND !empty($_GET['titre']) AND !empty($_GET['id'])) {
   $get_titre = htmlspecialchars($_GET['titre']);
   $get_id = htmlspecialchars($_GET['id']);
   $titre_original = $bdd->prepare('SELECT sujet FROM f_topics WHERE id = ?');
   $titre_original->execute(array($get_id));
   $titre_original = $titre_original->fetch()['sujet'];
   
   if($get_titre == url_custom_encode($titre_original)) {
      $topic = $bdd->prepare('SELECT * FROM f_topics WHERE id = ?');
      $topic->execute(array($get_id));
      $topic = $topic->fetch();
      
      if(isset($_POST['topic_reponse_submit'],$_POST['topic_reponse'])) {
          $reponse = htmlspecialchars($_POST['topic_reponse']);
          
          if(isset($_SESSION['id_user'])) {
             
             if(!empty($reponse)) {
                $ins = $bdd->prepare('INSERT INTO f_messages(id_topic,id_posteur,contenu,date_heure_post) VALUES (?,?,?,NOW())');
                $ins->execute(array($get_id,$_SESSION['id_user'],$reponse));
                $reponse_msg = "Votre réponse a bien été postée";
                unset($reponse);
                
             } else {
                $reponse_msg = "Votre réponse ne peut pas être vide !";
             }
          } else {
             $reponse_msg = "Veuillez vous connecter ou créer un compte pour poster une réponse";
          }
       }

      $repParPage = 7;
      $repTotalesReq = $bdd->prepare('SELECT * FROM f_messages WHERE id_topic = ?');
      $repTotalesReq->execute(array($get_id));
      $repTotales = $repTotalesReq->rowCount();
      $pagesTotales = ceil($repTotales/$repParPage);
      if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
         $_GET['page'] = intval($_GET['page']);
         $pageCourante = $_GET['page'];
      } else {
         $pageCourante = 1;
      }
      $depart = ($pageCourante-1)*$repParPage;

      $reponses = $bdd->prepare('SELECT * FROM f_messages WHERE id_topic = ? LIMIT '.$depart.','.$repParPage);
      $reponses->execute(array($get_id));


   } else {
      die('Erreur: Le titre ne correspond pas à l\'id');
   }
   
   require('view/topic.view.php');

} else {
   die('Erreur...');
}

?>