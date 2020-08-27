<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="CSS/style.css" />
<link rel= "stylesheet" href="CSS/accueil.css">
</head>
<body>
<img src="images/Khady SALL 2.png" class="logo" width="270" height="121">
<header class="header">
        <ul id="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Articles</a></li>            
            <li><a href="maGalerie.php">Galerie</a>  </li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="register.php">Connexion</a></li>
          </ul>         
    </header>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);

  /* récupérer le code captcha et supprimer les antislashes ajoutés par le formulaire
$password = stripslashes($_REQUEST['code']);
$password = mysqli_real_escape_string($conn, $code);*/
  
//requéte SQL + mot de passe crypté
    $query = "INSERT into `Users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>

</body>
</html>