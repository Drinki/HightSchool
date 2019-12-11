<?php
session_start();

require('config.php');

if(isset($_SESSION['id_user'])) {
   $requser = $bdd->prepare("SELECT * FROM user WHERE id_user = ?");
   $requser->execute(array($_SESSION['id_user']));
   $user = $requser->fetch();
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id_user = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id_user']));
      header('Location: profil.php?id='.$_SESSION['id_user']);
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE user SET mail = ? WHERE id_user = ?");
      $insertmail->execute(array($newmail, $_SESSION['id_user']));
      header('Location: profil.php?id='.$_SESSION['id_user']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE user SET password = ? WHERE id_user = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id_user']));
         header('Location: profil.php?id='.$_SESSION['id_user']);
      } else {
         $msg = "Vos deux mot de passe ne correspondent pas !";
      }
   }
?>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/style_head.css" />
      <title><?= $user['pseudo'] ?> Profil - HighSchool.com </title>
   </head>
   
   <?php //En tête du site. // 
   require('head.php');
   ?>

   <body>
      <div align="center" class="log">
         <h2>Edition de mon profil</h2>
         <div align="center" class="pform">
            <form method="POST" action="" enctype="multipart/form-data">
               <table>
                  <tr>
                     <td align="right"><label for="pseudo">Pseudo :</label></td>
                     <td align="right"><input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" class="linput" size="50" /><br /><br /></td>
                  </tr>

                  <tr>
                     <td align="right"><label for="mail">Mail :</label></td>
                     <td align="right"><input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" class="linput" size="50" /><br /><br /></td>
                  </tr>

                  <tr>
                     <td align="right"><label for="password">Mot de passe :</label></td>
                     <td align="right"><input type="password" name="newmdp1" placeholder="Mot de passe" class="linput" size="50"/><br /><br /></td>
                  </tr>

                  <tr>
                     <td align="right"><label for="password_2">Confirmation du mot de passe :</label></td>
                     <td align="right"><input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" class="linput" size="50"/><br /><br /></td>
                  </tr>

                  <tr>
                     <td></td>
                     <td align="center"><input type="submit" value="Mettre à jour mon profil !" id="lsubmit" size="50" /></td>
                  </tr>

               </table>
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
         
         <a href="editionprofil.php">Editer mon profil  |  </a>
         <a href="disconnection.php">Se déconnecter</a>
         
      </div>
      <br>
	  
	<?php //Bas de page // 
    require('footer.php');
    ?>
	  
   </body>
</html>
<?php   
}
else {
   header("Location: connexion.php");
}
?>